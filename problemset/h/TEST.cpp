#include <iostream>
#include <vector>

using namespace std;

int main()
{
    vector <int> vec ;
    int n ,test;
    cin>>n ;
    int arr[n] ;

    for(int i=0 ;i<n ;i++)
    {
        test=0 ;
        cin>>arr[i] ;
        if(i>0)
        {
            for(int j=i-1 ;j>=0 ;j--)
            {
                if(arr[i]==arr[j])
                    test=1 ;
                    break ;
            }
        }
        if(test==0)
            vec.push_back(arr[i]) ;
    }

    int s=vec.size();

    cout<<s<<endl ;



    for(int i=1 ;i<s-1 ;i++)
        cout<<vec[i]<<" " ;

    cout<<endl ;

    return 0;
}
