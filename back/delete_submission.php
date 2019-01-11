<?php
require_once 'database_connection.php';

if(isset($_POST)){
    $connection = get_sql_connection();
    $is_all = $_POST['all'];
    // submission_id = null, delete all
    if(delete_submissions_by_id($connection, null, $is_all)){
        echo "All submissions are deleted successfully";
    }else{
        echo "Something went wrong";
    }
    close_sql_connection($connection);
}
