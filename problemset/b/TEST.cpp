#include <iostream>
using namespace std;

int main() {
	int x,y,z,i,sum=0;
	cin>>x>>y>>z;
	for(i=1;i<=z;  ){
	sum=sum+i*x;
	i++;
	}
	if(sum-y<0)
	cout<<0;
	else
	cout<<sum-y;
	
	return 0;
}