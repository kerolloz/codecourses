<?php
session_start();
require '../back/database_connection.php';
$connection = get_sql_connection();
$user_id = $_SESSION['user_id'];
$contest_id = $_GET['contest_id'];
$sql = "INSERT INTO users_in_contests(user_id, contest_id) VALUES($user_id, $contest_id)";
if ($connection->query($sql) === TRUE) {//execute the sql statement
    echo "registered successfully";
}else{
    if (strpos($connection->error, "Duplicate") !== false) {
        echo "Already registered";
    }else{
        echo "ERROR" . $connection->error;
    }
}
