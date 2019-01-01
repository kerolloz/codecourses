<?php

require 'database_connection.php';

if (isset($_POST['contest_id'])) {
    $connection = get_sql_connection();
    if (delete_contest_by_id($connection, $_POST['contest_id'])) {
        echo "Deleted successfully";
    } else {
        echo "Something went wrong";
    }
    close_sql_connection($connection);
}
