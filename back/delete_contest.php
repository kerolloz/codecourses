<?php

require_once 'database_connection.php';

if (isset($_POST['contest_id'])) {
    $connection = get_sql_connection();

    if(delete_all_associated_submissions_with_problems_in_contest($connection, $_POST['contest_id']))
        echo "Associated submissions are Deleted\n";
    else
        echo "Couldn't delete Associated submissions in contest\n";

    if(delete_all_associated_problems_to_contest($connection, $_POST['contest_id']))
        echo "Associated Problems are deleted\n";
    else
        echo "Couldn't delete Associated Problems\n";

    if(delete_all_associated_registered_users_in_contests($connection, $_POST['contest_id']))
        echo "Associated registered users in contest are Deleted\n";
    else
        echo "Couldn't delete Associated registered users in contest\n";



    if (delete_contest_by_id($connection, $_POST['contest_id'])) {
        echo "Deleted successfully!";
    } else {
        echo "Something went wrong";
    }
    close_sql_connection($connection);
}
