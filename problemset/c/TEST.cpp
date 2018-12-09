#include <stdio.h>
#include <stdlib.h>

int main()
{
    int n,k,c;
    scanf("%d %d",&n,&k);
    for(c=1;c<=k;c=c+1)
        {
            if (n%10==0)
                n=n/10;
        else
        n=n-1;
    }

    printf("%d",n);

    return 0;
}