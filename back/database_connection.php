<?php

function get_sql_connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ojDB";

    $conn = new mysqli($servername, $username, $password, $dbname); //connect to database
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function get_pdo_sql_connection()
{

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ojDB";
    //make PDO object with database information
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //create database statement (will execute only if the database doesn't exist)
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname character set UTF8mb4 collate utf8mb4_bin";
    // use exec() because no results are returned
    $conn->exec($sql);
    //make PDO object again to determine the database
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //create table statement (will execute only if the table doesn't exist)
    return $conn;
}

function get_last_insert_id(&$connection)
{
    return $connection->insert_id;
}

function delete_contest_by_id(&$connection, $contest_id)
{
    if ($connection === false) {
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }

    $sql = "DELETE FROM contests WHERE contest_id=$contest_id";
    return ($connection->query($sql) === true);
}

function delete_problem_by_id(&$connection, $problem_id)
{
    if ($connection === false) {
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }

    $sql = "DELETE FROM problems WHERE problem_id=$problem_id";
    return ($connection->query($sql) === true);
}

function get_problem_details_from_database($problem_id, &$connection)
{
    $sql = "SELECT memory_limit, time_limit FROM problems WHERE problem_id = $problem_id"; //prepare the sql statement
    $result = $connection->query($sql); //execute the sql statement and get the result object
    if ($result->num_rows > 0) { // by the way this sql statement should return only 1 row because problem_id is UNIQUE
        // output data of each row
        while ($row = $result->fetch_assoc()) { //fetching data from result object row by row
            return $row; //return the time limit of rhe problem
        }
    } else {
        return 0; //if there is no time limit stored on database (for safety)
    }
}

function add_submission_to_database($problem_id, $user_id, $sol_language, &$connection)
{
    $sql = "INSERT INTO submissions (problem_id, user_id, status, sol_language)
    VALUES ($problem_id, $user_id , 'pending', '$sol_language')";//prepare the sql statement
    if ($connection->query($sql) === true) {//execute the sql statement
        return $connection->insert_id; //return submission id
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

function change_submission_status($submission_id, $status, &$connection)
{
    $sql = "UPDATE submissions SET status='$status' WHERE submission_id=$submission_id";
    if ($connection->query($sql) === true) {
    } else {
        echo "Error updating record: " . $connection->error.$sql;
    }
}

function increment_number_of_solvers($problem_id, &$connection)
{
    // check if the user has solved the problem before
    if (is_solved_for_user($problem_id, $_SESSION['user_id'], $connection)) {
        return 0;
    } // don't add it
    $sql = "SELECT number_of_solvers FROM problems WHERE problem_id = $problem_id";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) { // by the way this sql statement should return only 1 row because problem_id is UNIQUE
        // output data of each row
        while ($row = $result->fetch_assoc()) { //fetching data from result object row by row
            $sql = "UPDATE problems SET number_of_solvers=".($row['number_of_solvers']+1)." WHERE problem_id=$problem_id";
            if ($connection->query($sql) === true) {
            } else {
                echo "Error updating record: " . $connection->error;
            }
        }
    } else {
        return 0; //if there is no time limit stored on database (for safety)
    }
}

function is_solved_for_user($problem_id, $user_id, &$connection)
{
    $sql = "SELECT problem_id FROM submissions WHERE problem_id = $problem_id AND user_id = $user_id AND status = 'accepted'"; //prepare the sql statement
    $result = $connection->query($sql); //execute the sql statement and get the result object
    //echo $result->num_rows;
    return ($result->num_rows > 0);
}

function close_sql_connection(&$connection)
{
    $connection->close();
    $connection = null;
}
