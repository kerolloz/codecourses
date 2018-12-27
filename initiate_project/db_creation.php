<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ojDB";

$users_columns = ["user_id","first_name","last_name","username","gender","privileges", "email", "password"]; //users_columns names
$contests_columns = ["contest_id","name","date","length","setter"];
$submissions_columns = ["submission_id", "problem_id", "user_id",
    "status", "sol_language","FOREIGN KEY","FOREIGN KEY"]; //submissions_columns names
$usersInContest = ["user_id", "contest_id","PRIMARY KEY","FOREIGN KEY","FOREIGN KEY"]; //submissions_columns names
$problems_columns = ["problem_id", "name", "types", "level","contest_id","number_of_solvers","time_limit","memory_limit","FOREIGN KEY"]; //problems_columns names



//constrains for each column (tow dimensions array one for each column)
$users_constrains = [["INT(6)", "UNSIGNED AUTO_INCREMENT", "PRIMARY KEY"],
    ["VARCHAR(30)", "NOT NULL"], ["VARCHAR(30)", "NOT NULL"],["VARCHAR(30)", "NOT NULL"],
    ["VARCHAR(15)", "NOT NULL"],["VARCHAR(30)", "NOT NULL","DEFAULT 'user'"],
    ["VARCHAR(50)", "NOT NULL"], ["VARCHAR(32)", "NOT NULL"]];
$contests_constrains = [["INT(6)", "UNSIGNED AUTO_INCREMENT", "PRIMARY KEY"],
    ["VARCHAR(100)", "NOT NULL"], ["TIMESTAMP", "NOT NULL"],
    ["INT(9)", "NOT NULL"],["VARCHAR(40)", "NOT NULL"]];
$problem_constrains = [["INT(6)", "UNSIGNED AUTO_INCREMENT", "PRIMARY KEY"],
    ["VARCHAR(30)", "NOT NULL"], ["VARCHAR(60)", "NOT NULL"],
    ["INT(1)", "NOT NULL"],["INT(6)","UNSIGNED", "NOT NULL"],["INT(9)", "NOT NULL","DEFAULT 0"],
    ["INT(1)", "NOT NULL"],["INT(1)", "NOT NULL"],
    ["($problems_columns[4]) REFERENCES contests($contests_columns[0])"]];
$submissions_constrains = [["INT(6)", "UNSIGNED AUTO_INCREMENT", "PRIMARY KEY"],
    ["INT(6)","UNSIGNED","NOT NULL"], ["INT(6)","UNSIGNED", "NOT NULL"],
    ["VARCHAR(30)", "NOT NULL"], ["VARCHAR(30)", "NOT NULL"], ["($submissions_columns[1]) REFERENCES problems($problems_columns[0])"],
    ["($submissions_columns[2]) REFERENCES users($users_columns[0])"]];
$usersInContest_constrains = [["INT(6)", "UNSIGNED", "NOT NULL"],
    ["INT(6)","UNSIGNED","NOT NULL"],["($usersInContest[0], $usersInContest[1])"],
    ["($usersInContest[0]) REFERENCES users($users_columns[0])"],
    ["($usersInContest[0]) REFERENCES contests($contests_columns[0])"]];

try {
    //make PDO object with database information
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //create database statement (will execute only if the database doesn't exist)
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname character set UTF8mb4 collate utf8mb4_bin";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database created successfully\n";
    //make PDO object again to determine the database
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //create table statement (will execute only if the table doesn't exist)
    $sql = "CREATE TABLE IF NOT EXISTS contests (";
    $sz = sizeof($contests_columns); //number of users_columns
    for ($i=0; $i < $sz; $i++){
        $sql .= $contests_columns[$i]; //add column name and space
        $sql .= " ";
        foreach ($contests_constrains[$i] as $constrain) //loop on the users_constrains for each column
        {
            $sql .= $constrain; //add users_constrains after each column name separated py space
            $sql .= " ";
        }
        //adding ) only if it is the last column to close that opened above or , if it is not the last one
        if ($i == $sz-1)
        {
            $sql .= ") ENGINE=InnoDB;";
        }else  $sql .= ",";
    }
    // use exec() because no results are returned
    $conn->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS users (";
    $sz = sizeof($users_columns); //number of users_columns
    for ($i=0; $i < $sz; $i++){
        $sql .= $users_columns[$i]; //add column name and space
        $sql .= " ";
        foreach ($users_constrains[$i] as $constrain) //loop on the users_constrains for each column
        {
            $sql .= $constrain; //add users_constrains after each column name separated py space
            $sql .= " ";
        }
        //adding ) only if it is the last column to close that opened above or , if it is not the last one
        if ($i == $sz-1)
        {
            $sql .= ") ENGINE=InnoDB;";
        }else  $sql .= ",";
    }
    // use exec() because no results are returned
    $conn->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS problems (";
    $sz = sizeof($problems_columns); //number of users_columns
    for ($i=0; $i < $sz; $i++){
        $sql .= $problems_columns[$i]; //add column name and space
        $sql .= " ";
        foreach ($problem_constrains[$i] as $constrain) //loop on the users_constrains for each column
        {
            $sql .= $constrain; //add users_constrains after each column name separated py space
            $sql .= " ";
        }
        //adding ) only if it is the last column to close that opened above or , if it is not the last one
        if ($i == $sz-1)
        {
            $sql .= ") ENGINE=InnoDB;";
        }else  $sql .= ",";
    }
    // use exec() because no results are returned
    $conn->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS submissions (";
    $sz = sizeof($submissions_columns); //number of users_columns
    for ($i=0; $i < $sz; $i++){
        $sql .= $submissions_columns[$i]; //add column name and space
        $sql .= " ";
        foreach ($submissions_constrains[$i] as $constrain) //loop on the users_constrains for each column
        {
            $sql .= $constrain; //add users_constrains after each column name separated py space
            $sql .= " ";
        }
        //adding ) only if it is the last column to close that opened above or , if it is not the last one
        if ($i == $sz-1)
        {
            $sql .= ") ENGINE=InnoDB;";
        }else  $sql .= ",";
    }
    // use exec() because no results are returned
    $conn->exec($sql);
    $sql = "CREATE TABLE IF NOT EXISTS users_in_contests (";
    $sz = sizeof($usersInContest); //number of users_columns
    for ($i=0; $i < $sz; $i++){
        $sql .= $usersInContest[$i]; //add column name and space
        $sql .= " ";
        foreach ($usersInContest_constrains[$i] as $constrain) //loop on the users_constrains for each column
        {
            $sql .= $constrain; //add users_constrains after each column name separated py space
            $sql .= " ";
        }
        //adding ) only if it is the last column to close that opened above or , if it is not the last one
        if ($i == $sz-1)
        {
            $sql .= ") ENGINE=InnoDB;";
        }else  $sql .= ",";
    }
    // use exec() because no results are returned
    echo $sql;
    $conn->exec($sql);
    echo "----------Doneee---------\n";
}
catch(PDOException $e)//the good thing that the PDO class have his one Exceptions to catch
{
	echo $e->getMessage();
	echo "-------------ERRRRRRRRRRRRRRROR-----------\n";
    echo $sql . "\n" . $e->getMessage();
}
	
$conn = null;//closing the connection

?>