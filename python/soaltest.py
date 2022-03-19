#soal 1 

'''if __name__ == '__main__':
    a = int(input())
    b = int(input())
    print(a+b)
    print(a-b)
    print(a*b)'''

#soal 2 

'''def is_leap(year):
    leap = False
    
    if year%4==0 :
        if year%100==0:
            if year%400==0:
                leap = True    
            elif year%400!=0:
                leap = False
        else :
             leap = True
    return leap

year = int(input())
print(is_leap(year))
'''

#soal 3

'''if __name__ == '__main__':
    n = int(input())
    student_marks = {}
    for _ in range(n):
        name, *line = input().split()
        scores = list(map(float, line))
        student_marks[name] = scores
    query_name = input()
    print(format(sum(student_marks[query_name])/len(student_marks[query_name]),'.2f'))
'''

#soal 4
'''
if __name__ == '__main__':
    namescore = []
    Score = []
    for _ in range(int(raw_input())):
        name = raw_input()
        score = float(raw_input())
        namescore.append([name,score])
        Score.append(score)
    Score = list(set(Score))
    Score.sort()
    namescore.sort(key = lambda x: x[0])
    for i in range(len(namescore)):
        if Score[1]==namescore[i][1]:
            print(namescore[i][0])'''