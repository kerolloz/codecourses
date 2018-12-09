#include <iostream>

using namespace std;

int main()
{
    int a ,counter1=1,counter2=1;
    cin>>a ;

    int arr[a];
    for(int i=0 ;i<a ;i++)
        cin>>arr[i] ;

    for(int i=a-1 ;i>=0 ;i--)
    {
        counter1=1 ;
        for(int j=i-1 ;j>=0 ;j--)
        {
            if(arr[i]==arr[j])
                counter1++ ;
        }

        if(counter1>counter2)
            counter2=counter1 ;

    }


        cout<<counter2<<endl ;


    return 0;
}
