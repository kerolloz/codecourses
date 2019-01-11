<?php
require_once 'database_connection.php';

if(isset($_POST)){
    if(delete_submissions_by_id($all=true)){
        echo "All submissions are deleted successfully";
    }else{
        echo "Something went wrong";
    }
}
