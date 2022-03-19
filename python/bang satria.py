'''def over(kwh,pop,th,value):
        ex = [num1*num2 for num1,num2 in zip(kwh,pop)]
        summ = reduce(add,ex)
        while summ > th :
            x=randint(0,len(pop)-1)
            pop[x] = Random(value[x],jam[x])
            ex = [num1*num2 for num1,num2 in zip(kwh,pop)]
            summ = reduce(add,ex)
        return pop
'''