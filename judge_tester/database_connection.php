<?php

function database_connection_object(){
    $servername = "localhost";
    $username = "root";
    $password = "Kk012053310258";
    $dbname = "ojDB";

    $conn = new mysqli($servername, $username, $password, $dbname);//connect to database
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}


function get_problem_time_limit_from_database($problem_id,$connection){

    $sql = "SELECT memory_limit, time_limit FROM problems WHERE problem_id = $problem_id"; //prepare the sql statement
    $result = $connection->query($sql); //execute the sql statement and get the result object
    if ($result->num_rows > 0) { // by the way this sql statement should return only 1 row because problem_id is UNIQUE
        // output data of each row
        while($row = $result->fetch_assoc()) { //fetching data from result object row by row
            return $row; //return the time limit of rhe problem
        }
    } else {
        return 0; //if there is no time limit stored on database (for safety)
    }
}

function add_submission_to_database($problem_id, $user_id, $problem_status, $sol_language, $connection){
    $sql = "INSERT INTO submissions (problem_id, user_id, status, sol_language)
    VALUES ($problem_id, $user_id , '$problem_status', '$sol_language')";//prepare the sql statement
    if ($connection->query($sql) === TRUE) {//execute the sql statement
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

}

function close_and_delete_database_object(&$connection){
  $connection->close();
  $connection = null;
}
