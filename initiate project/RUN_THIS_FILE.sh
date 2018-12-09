start_xampp() { sudo /opt/lampp/lampp "$1" ; }

dashes="--------------------------";

echo $dashes;

echo "[-]Initiating your project!\n";
echo "[-]Activating Apache and MySQL servers";
start_xampp startapache
start_xampp startmysql 
echo "[-]Please wait 5 Seconds";
sleep 5; # wait untill the servers run correctly 
echo "[-]Running db_creation.php";
/opt/lampp/bin/php ./db_creation.php; 
echo "[-]Opening Firefox localhost/codecourses";
firefox localhost/codecourses &


echo $dashes;



