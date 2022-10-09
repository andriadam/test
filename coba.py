n=int(input())                                 #Taking input
array=list(map(int,input().split()))       
count=0
Stack=[]                                    #initialising empty list
Max=0
for i in range(len(array)):
    if len(Stack)==0 and array[i]>0:
        Stack.append(array[i])
    elif(len(Stack)>0):
        if (-1*Stack[-1]==array[i] and Stack[-1]>0):
            Stack.pop()
            count+=2 
        if Max<count:
            Max=count
        else:
            Stack.append(array[i])
            count=0
print(Max)