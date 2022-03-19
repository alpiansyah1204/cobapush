#! C:\Users\alpian\AppData\Local\Programs\Python\Python39\python.exe
print("content-type:text/html\r\n\r\n")
print('<html>')

print('<body>')
import traceback


    # -*- coding: utf-8 -*-


import itertools,random
from random import randint,random
from operator import add
from functools import reduce 

import numpy

"""#Aturan

1. Device prioritas 1 = nilai acak mulai dari 18 sampai dengan 24  value 1000
2. Device prioritas 2 = nilai acak mulai dari 16 sampai dengan 22  value 900
3. Device prioritas 3 = nilai acak mulai dari 14 sampai dengan 20  value 800
4. Device prioritas 4 = nilai acak mulai dari 12 sampai dengan 18  value 700
5. Device prioritas 5 = nilai acak mulai dari 10 sampai dengan 16  value 600
6. Device prioritas 6 = nilai acak mulai dari 8 sampai dengan 14  value 500
7. Device prioritas 7 = nilai acak mulai dari 6 sampai dengan 12  value 400
8. Device prioritas 8 = nilai acak mulai dari 4 sampai dengan 10  value 300
9. Device prioritas 9 = nilai acak mulai dari 2 sampai dengan 8  value 200
10. Device prioritas 10 = nilai acak mulai dari 1 sampai dengan 6  value 100

#soal

1. Device 1 : Daya = 0.9 kWh, Prioritas = 1, Value = 1000 Jam = Auto
2. Device 2 = Daya = 1 kWh, Prioritas = 2, Value = 900 Jam = Auto
3. Device 3 = Daya = 1.2 kWh, Prioritas = 3, Value = 800 Jam = Auto
4. Device 4 = Daya = 0.05 kWh, Prioritas = 4, Value = 700 Jam = Auto
5. Device 5 = Daya = 0.125 kWh, Prioritas = 5, Value = 600 Jam = Auto
6. Device 6 = Daya = 0.6 kWh, Prioritas = 6, Value = 500 Jam = Auto
7. Device 7 = Daya = 0.23 kWh, Prioritas = 7, Value = 400 Jam = Auto
8. Device 8 = Daya = 0.09 kWh, Prioritas = 8, Value = 300 Jam = Auto
9. Device 9 = Daya = 0.15 kWh, Prioritas = 9, Value = 200 Jam = Auto
10. Device 10 = Daya = 0.3 kWh, Prioritas = 10, Value = 100 Jam = Auto
11. Jumlah Tagihan = Rp.1,000,000 (681.53320 kWh)
12. Hari = 7
"""

import mysql.connector
import mysql.connector


def Value(y,x):
    if x == 1 :
        return 1000
    elif x==2:
        return 900
    elif  x==3:
        return 800
    elif x==4:
        return 700
    elif x==5:
        return 600
    elif x==6:
        return 500
    elif x==7:
        return 400
    elif x==8:
        return 300
    elif x==9:
        return 200
    elif x==10:
        return 100



mydb = mysql.connector.connect(
host="localhost",
user="root",
password="",
database="dblatihan1"
)
mycursor = mydb.cursor()

f = open("variable.txt","r")
id_user = f.read()
id_user = str(id_user)
f.close()





kwh = []
value = []
jam = []
sql = f'SELECT * FROM `device` WHERE `id_user` = {id_user}'
mycursor.execute(sql)
device = []
H = []
M= []
for i in mycursor:
    if i[3] > 1:
        for j in range(i[3]):
            kwh.append(i[2])
            value.append(Value(i[4],i[5]))
            jam.append(i[4])
            device.append(i)
            H.append(i[-2])
            M.append(i[-1])

    else:
        kwh.append(i[2])
        value.append(Value(i[4],i[5]))
        jam.append(i[4])
        device.append(i)
        H.append(i[-2])
        M.append(i[-1])

    #print(i)

sql = f"SELECT * FROM pasca WHERE `id_user` = {id_user}"
mycursor.execute(sql)
hari = 0
kwh_total = 0
for i in mycursor:
    kwh_total=i[2]
    hari = i[3]
th = round(kwh_total/hari)
#print(kwh)
#print(value)
#print(jam)
#print(th)


"""# inisialisasi populasi"""


def Random(nilai,jam):
    ex = 0
    if  nilai == 1000 :
        if jam.upper() == 'AUTO':
            ex = randint(18,24)
        else :
            ex = int(jam)
    elif  nilai == 900 :
        if jam.upper() == 'AUTO':
            ex = randint(16,22)
        else :
            ex = int(jam)
    elif  nilai == 800 :
        if jam.upper() == 'AUTO':
            ex = randint(14,20)
        else :
            ex = int(jam)
    elif  nilai == 700 :
        if jam.upper() == 'AUTO':
            ex = randint(12,18)
        else :
            ex = int(jam)
    elif  nilai == 600 :
        if jam.upper() == 'AUTO':
            ex = randint(10,16)
        else :
            ex = int(jam)
    elif  nilai == 500 :
        if jam.upper() == 'AUTO':
            ex = randint(8,14)
        else :
            ex = int(jam)
    elif  nilai == 400 :
        if jam.upper() == 'AUTO':
            ex = randint(6,12)
        else :
            ex = int(jam)
    elif  nilai == 300 :
        if jam.upper() == 'AUTO':
            ex = randint(4,10)
        else :
            ex = int(jam)
    elif  nilai == 200 :
        if jam.upper() == 'AUTO':
            ex = randint(2,8)
        else :
            ex = int(jam)
    elif  nilai == 100 :
        if jam.upper() == 'AUTO':
            ex = randint(1,6)
        else :
            ex = int(jam)
    return ex

def population(value,jam):
    pop = []
    for i in range(len(value)):
        pop.append(Random(value[i],jam[i]))
    return pop

"""Populasi"""

pop = [population(value,jam) for i in range(len(kwh))]

print(pop)
print(device)



"""#Langkah-langkah yang akan diulang-ulang"""

def list_eva(pop,value):
    ex = [num1*num2 for num1,num2 in zip(pop,value)]
    sum_fitnes = reduce(add,ex)
    return sum_fitnes

def over(kwh,pop,th,value):
    ex = [num1*num2 for num1,num2 in zip(kwh,pop)]
    summ = reduce(add,ex)
    while summ > th :
        x=randint(0,len(pop)-1)
        pop[x] = Random(value[x],jam[x])
        ex = [num1*num2 for num1,num2 in zip(kwh,pop)]
        summ = reduce(add,ex)
    return pop

def evolve(pop,th,value,kwh):
    pop = [over(kwh,i,th,value) for i in pop] 
    fitness = [list_eva(i,value) for i in pop] #evaluasi Kromosom
    sum_fitness = reduce(add,fitness)
    list_fitness = [x/sum_fitness for x in fitness]
    
    #copy 5 best koromosom
    pop_copy_1 = pop.copy()
    fitness_copy_1 = fitness.copy()

    print("ini satuuu")

    #sorting populasi yand di copy
    pop_copy_1 = numpy.array(pop_copy_1)
    fitness_copy_1 = numpy.array(fitness_copy_1)
    inds = fitness_copy_1.argsort()
    pop_copy_1 = pop_copy_1[inds]
    fitness_copy_1 = fitness_copy_1[inds]
    pop_copy_1 = pop_copy_1.tolist()
    fitness_copy_1 = fitness_copy_1.tolist()
    pop_copy_1.reverse()
    fitness_copy_1.reverse()


    #membagi 2 
    pop_copy_1 = pop_copy_1[:int(round(len(pop)/2))]
    fitness_copy_1 = fitness_copy_1[:int(round(len(fitness)/2))]
    
    #pop_cadangan 
    pop_cadangan = pop_copy_1.copy()

    #Seleksi Kromosom roulette wheel
    if_fitness = [0]
    for i in range(len(list_fitness)):
        if_fitness.append((if_fitness[i]+list_fitness[i]))

    for i in range(len(pop)):
        x = random()
        if x > if_fitness[i+1]:
            for j in range(len(if_fitness)-1):
                if x > if_fitness[j] and x < if_fitness[j+1]:
                
                    pop[i],pop[j] = pop[j],pop[i]


    #membagi 2 setelah di sort
    pop = pop[:int(round(len(pop)/2))]
    fitness = fitness[:int(round(len(fitness)/2))]


    #Crossover
    for i in range(len(pop)):
        if random()>0.4:
            fn = randint(0,len(pop)-1)
            mn = randint(0,len(pop)-1)
            ran = randint(0,len(pop)-1)

            if fn != mn:
                #print(pop[fn],pop[mn])
                pop[fn][-ran:],pop[mn][-ran:] = pop[mn][-ran:],pop[fn][-ran:]
                #print(pop[fn],pop[mn])

    #pengecekan apakah melebhi threshold
    pop = [over(kwh,i,th,value) for i in pop]

    #Mutasi
    for i in range(len(pop)):
        if random() > 0.4 :
            x= randint(0,len(pop)-1)
            y= randint(0,len(value)-1)
            #print(x,pop[x],value[y])
            pop[x][y] = Random(value[y],jam[y])
            #print(pop[x])
    
    #pengecekan apakah melebihi threshold
    pop = [over(kwh,i,th,value) for i in pop]

    #penambahan populasi 
    for i in pop_cadangan:
        pop.append(i)
    

    fitness = [list_eva(i,value) for i in pop]

    #sorting mencari kromosom terbaik berdasarkan total value*kromosom

    pop = numpy.array(pop)
    fitness = numpy.array(fitness)
    inds = fitness.argsort()
    pop = pop[inds]
    fitness = fitness[inds]
    pop = pop.tolist()
    fitness = fitness.tolist()
    pop.reverse()
    fitness.reverse()
    
    return pop,fitness

"""Pengecekan nilai grade """

def cek_fitness(indi,th,kwh):
    ex = [num1*num2 for num1,num2 in zip(indi,kwh)]
    sum = reduce(add, ex,0)
    #print(target-sum)
    return abs(th-sum)

def grade(pop, th,kwh):
    summed = reduce(add, (cek_fitness(x, th,kwh) for x in pop))
    #print(summed/len(pop))
    return round(summed/len(pop),1)

"""Perulangan program utama"""

x=0
y = 0
fitness_history = [grade(pop,th,kwh)]
best_pop = [(grade(pop,th,kwh),pop)]
fitness=[]
best_fitness =[]
mean_fitness = []
best = []
print(pop)



pop,fitness  = evolve(pop,th,value,kwh)
best_fitness.append(fitness[0])
mean_fitness.append(sum(fitness)/len(fitness))
pop
print("ini popppppp",pop)

while x!=200:
    pop, fitness = evolve(pop,th,value,kwh)
    fitness_history.append(grade(pop,th,kwh))
    sum_fitness = fitness[0]
    
    if best_fitness[y] <= sum_fitness:
        print(x)
        x+=1
        y+=1
        best_fitness.append(fitness[0])
        mean_fitness.append(sum(fitness)/len(fitness))
        best_pop.append((grade(pop,th,kwh),pop))
        best.append((fitness[0],pop[0]))
    #print(f'{best[0]}')
    #print(fitness_history[x])


"""##cara pertama mencari kromosom terbaik dengan cara mencari total pemakaian yang mendekati threshold

sorting kromosom dengan mencari nilai rata-rata pemakaian yang mendekati threshold
"""

def sortt(e):
    return e[0]
best_pop.sort(key=sortt)


"""##Cara kedua mencari populasi dengan cara mencari fitness tertinggi

sorting variable untuk mendapatkan fitness terbaik
"""

best.sort(key=sortt ,reverse=True)
#print(f'nilai Velue {best[0][0]} dengan populasi { best[0][1]}')

hasil = best[0][1]
#print(hasil)
#print('\n')
summ = [num1*num2 for num1,num2 in zip(hasil,kwh)] 
summed= reduce(add,summ)
#print(summed)
#print('\n')
#print(list_eva(hasil,value))


#menghapus isi hasil yaitu fitness dan total pemakain kwh lalu menambahkan kembali 
mycursor = mydb.cursor()

sql = f"DELETE FROM hasil WHERE `id_user` = {id_user}"

mycursor.execute(sql)

mydb.commit()


sql = "INSERT INTO `hasil`(`value`, `kwh` , `id_user`) VALUES (%s,%s,%s)"
val = (list_eva(hasil,value),summed, id_user)
mycursor.execute(sql,val)

mydb.commit()
#print(mycursor.rowcount, "record inserted.")


#batas mengisi hasil yaitu fitness dan total pemakain kwh lalu menambahkan kembali 



"""Note: alasan adanya kedua cara karena terkadang ada hasil yang tidak optimal"""

mean_fitness = [int(x) for x in mean_fitness]

x = 0
val = [('NULL',best_fitness[i],mean_fitness[i],id_user) for i in range(len(mean_fitness))]
'''for i in val:
    print(i)'''
#print(type(val))


#menghapus isi hasil yaitu fitness dan total pemakain kwh lalu menambahkan kembali 

mycursor = mydb.cursor()

sql = f"DELETE FROM fitness WHERE `id_user` = {id_user}"

mycursor.execute(sql)

mydb.commit()
#print(mycursor.rowcount, "record inserted.")

sql = "INSERT INTO `fitness`(`id`, `best_fitness`, `mean_fitness`, `id_user`) VALUES (%s,%s,%s,%s)"
mycursor.executemany(sql,val)

mydb.commit()
#print(mycursor.rowcount, "record inserted.")


taro = []
hasil_a =[]
x = 0
id_user = int(id_user)


for i in device :
    x+=1
    i = list(i)
    i[0] = 'NULL'
    i.pop(3)
    i.insert(5,hasil[x-1])
    i.append(i[7])
    i.append(i[8])
    i[9] = int(i[9])
    i[9]  = i[9]+i[5]
    if i[9]>=24 :
        i[9] = i[9]-24
        if i[9] < 10:
            i[9] = '0'+str(i[9])
        elif i[9] > 10: 
            i[9] = str(i[9])    
    i = tuple(i)
    hasil_a.append(i)
    

#hasil populasi akhir 

#hasil kromosom 

#perkembangan fitness mean dan best


mycursor = mydb.cursor()

sql = f"DELETE FROM h_device WHERE `id_user` = {id_user}"

mycursor.execute(sql)

mydb.commit()
#print(mycursor.rowcount, "record inserted.")

sql = f"INSERT INTO `h_device`(`id`, `Nama`, `Daya(Watt)`, `Jam`, `Prioritas`, `Rekomendasi` , `id_user` ,`H1` , `M1` ,`H2` , `M2` ) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"
mycursor.executemany(sql,hasil_a)

mydb.commit()
#print(mycursor.rowcount, "record inserted.")
print("<meta http-equiv='refresh' content='0;url=http://localhost/levi/?page=Hasil'>")

    


print('</body>')
print('</html>')
