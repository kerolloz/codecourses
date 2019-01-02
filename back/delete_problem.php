<?php

require 'database_connection.php';

if (isset($_POST['problem_id'])) {
    $connection = get_sql_connection();
    if (delete_problem_by_id($connection, $_POST['problem_id'])) {
        echo "Deleted successfully";
    } else {
        echo "Something went wrong";
    }
    close_sql_connection($connection);
}
