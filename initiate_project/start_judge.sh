start_xampp() { sudo /opt/lampp/lampp "$1"; }

dashes="--------------------------"

echo $dashes

echo "[-] Initiating your project!"
echo "[-] Activating Apache and MySQL servers"

start_xampp startapache
start_xampp startmysql
