<?php

require_once 'database_connection.php';

if (isset($_POST['problem_id'])) {
    $connection = get_sql_connection();

    if(delete_submissions_by_problem_id($connection, $_POST['problem_id']))
        echo "Associated submissions are deleted!";
    else
        echo "Couldn't delete associated submissions";

    echo "\n";
    
    if (delete_problem_by_id($connection, $_POST['problem_id']))
        echo "Deleted successfully";
    else
        echo "Something went wrong";

    close_sql_connection($connection);
}
