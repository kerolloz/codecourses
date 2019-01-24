<?php

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true):
    require '../back/database_connection.php';
else:
    header("location: ../authentication/");
endif;

$connection = get_sql_connection();

$user_id = $_SESSION['user_id'];
$contest_id = $_GET['contest_id'];

$sql = "INSERT INTO users_in_contests(user_id, contest_id) VALUES($user_id, $contest_id)";

if ($connection->query($sql) === true) {//execute the sql statement
    echo "registered successfully";
} else {
    if (strpos($connection->error, "Duplicate") !== false) {
        echo "Already registered";
    } else {
        echo "ERROR" . $connection->error;
    }
}

close_sql_connection($connection);
