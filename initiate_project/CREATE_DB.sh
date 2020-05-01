./start_judge.sh

echo "[-] Please wait..."

sleep 5 # wait until the servers run correctly

echo "[-] Running db_creation.php"

BASEDIR=$(dirname "$0")

/opt/lampp/bin/php "$BASEDIR"/db_creation.php

echo "[-] Opening Firefox localhost/codecourses"

firefox localhost/codecourses &

echo $dashes
