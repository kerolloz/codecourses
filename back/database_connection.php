<?php

$CONFIGURATION = require_once "../includes/config.inc.php";

function did_contest_start($contest_id, &$connection)
{
    $sql = "SELECT * FROM contests WHERE date < NOW() and contest_id=$contest_id";
    return ($connection->query($sql)->num_rows);
}

function get_number_of_submissions_for_user_in_problem($user_id, $problem_id, &$connection)
{
    $sql = "SELECT * FROM submissions WHERE problem_id=$problem_id and user_id=$user_id";
    return ($connection->query($sql)->num_rows);
}


function authentication($redirect=true)
{
    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true):
        return true; // okay user is logged in
    elseif ($redirect):
        header("location: ../authentication/");
    endif;

    return false;
}

function is_admin()
{
    // do not redirect if not logged in
    return (authentication(false) && $_SESSION['is_admin'] == "ADMIN");
}
function delete_submissions_by_problem_id(&$connection, $problem_id)
{
    $sql = "DELETE FROM submissions WHERE problem_id=$problem_id";
    return ($connection->query($sql)===true);
}

function set_all_number_of_solvers_to_zero(&$connection)
{
    $sql = "UPDATE problems set number_of_solvers=0";
    return ($connection->query($sql)===true);
}

function delete_submissions_by_submission_id(&$connection, $id=null, $all=false)
{
    $sql = "DELETE FROM submissions";
    if ($id) {
        $sql .= " WHERE submission_id=$id";
    }
    return ($connection->query($sql)===true && set_all_number_of_solvers_to_zero($connection)===true);
    // if no id is provided this will delete all submissions
}

function get_sql_connection()
{
    global $CONFIGURATION;
    $conn = new mysqli($CONFIGURATION['host_name'], $CONFIGURATION['user_name'], $CONFIGURATION['password'], $CONFIGURATION['database_name']); //connect to database
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function get_pdo_sql_connection()
{
    global $CONFIGURATION;
    //make PDO object with database information
    $conn = new PDO("mysql:host=$CONFIGURATION[host_name]", $CONFIGURATION['user_name'], $CONFIGURATION['password']);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //create database statement (will execute only if the database doesn't exist)
    $sql = "CREATE DATABASE IF NOT EXISTS $CONFIGURATION[database_name] character set UTF8mb4 collate utf8mb4_bin";
    // use exec() because no results are returned
    $conn->exec($sql);
    //make PDO object again to determine the database
    $conn = new PDO("mysql:host=$CONFIGURATION[host_name];dbname=$CONFIGURATION[database_name]", $CONFIGURATION['user_name'], $CONFIGURATION['password']);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //create table statement (will execute only if the table doesn't exist)
    return $conn;
}

function get_last_insert_id(&$connection)
{
    return $connection->insert_id;
}

function delete_all_associated_submissions_with_problems_in_contest(&$connection, $contest_id)
{
    if ($connection === false) {
        // check if the given connection is working
        $connection = get_sql_connection();
    }
    $sql = "DELETE submissions
            FROM ((submissions
            INNER JOIN problems ON submissions.problem_id = problems.problem_id)
            INNER JOIN contests ON contests.contest_id = problems.contest_id)
            WHERE contests.contest_id = $contest_id
            ";
    return ($connection->query($sql)===true);
}

function delete_all_associated_problems_to_contest(&$connection, $contest_id)
{
    if ($connection === false) {
        $connection = get_sql_connection();
    }
    $sql = "DELETE FROM problems WHERE contest_id=$contest_id";
    return ($connection->query($sql) === true);
}

function delete_all_associated_registered_users_in_contests(&$connection, $contest_id)
{
    if ($connection === false) {
        $connection = get_sql_connection();
    }
    $sql = "DELETE FROM users_in_contests WHERE contest_id=$contest_id";
    return ($connection->query($sql) === true);
}

function delete_contest_by_id(&$connection, $contest_id)
{
    if ($connection === false) {
        $connection = get_sql_connection();
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

function is_user_registered_at_contest($user_id, $contest_id, &$connection)
{
    $sql = "SELECT * FROM users_in_contests WHERE contest_id = $contest_id AND user_id = $user_id"; //prepare the sql statement
    $result = $connection->query($sql); //execute the sql statement and get the result object
    //echo $result->num_rows;
    return ($result->num_rows > 0);
}

function close_sql_connection(&$connection)
{
    $connection->close();
    $connection = null;
}
