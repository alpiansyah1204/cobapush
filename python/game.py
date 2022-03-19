from random import randrange
warna = ['m','h','b','k']
tebak = [warna[randrange(0,3)] for i in range(4)]
print(tebak)
x= 10
for i in range(8):
    tebakan=input().split()
    
    if (tebak[0]==tebakan[0] and 
        tebak[1]==tebakan[1] and 
        tebak[2]==tebakan[2] and 
        tebak[3]==tebakan[3]):
       
        print(tebak[0],tebakan[0] ,
        tebak[1],tebakan[1] ,
        tebak[2],tebakan[2]  ,
        tebak[3],tebakan[3])       
        print('benar')
       
    else:
        tebakanlist = list(dict.fromkeys(tebakan))
        for i in range(4):
            if tebak[i] == tebakan[i]:
                print('merah')
            else : 
                if tebakan[x] == tebakan[i]:
                    a=1
                elif tebakan[i] in tebak : 
                    x = i
                    print('putih') 
                

        

