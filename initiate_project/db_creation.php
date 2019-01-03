<?php

require '../back/database_connection.php';
require 'TableClass.php';

// variables naming convention
// A MUST FOLLOW CONVENTION

// <tablename>_columns
// <tablename>_constrains
//  add <tablename> to $all_names array

$users_columns = ["user_id","first_name","last_name","username","gender",
                "privileges", "email", "password"];

$contests_columns = ["contest_id","name","date","length","setter"];

$submissions_columns = ["submission_id", "problem_id", "user_id",
                        "status", "sol_language","FOREIGN KEY","FOREIGN KEY"];

$users_in_contests_columns = ["user_id", "contest_id","PRIMARY KEY",
                            "FOREIGN KEY","FOREIGN KEY"];

$problems_columns = ["problem_id", "name", "types", "level","contest_id",
                "number_of_solvers","time_limit","memory_limit","FOREIGN KEY"];


//constrains for each column (two dimensions array one for each column)
$users_constrains = [["INT(6)", "UNSIGNED AUTO_INCREMENT", "PRIMARY KEY"],
    ["VARCHAR(30)", "NOT NULL"], ["VARCHAR(30)", "NOT NULL"],["VARCHAR(30)", "NOT NULL"],
    ["VARCHAR(15)", "NOT NULL"],["VARCHAR(30)", "NOT NULL","DEFAULT 'user'"],
    ["VARCHAR(50)", "NOT NULL"], ["VARCHAR(32)", "NOT NULL"]];

$contests_constrains = [["INT(6)", "UNSIGNED AUTO_INCREMENT", "PRIMARY KEY"],
    ["VARCHAR(100)", "NOT NULL"], ["TIMESTAMP", "NOT NULL"],
    ["INT(9)", "NOT NULL"],["VARCHAR(40)", "NOT NULL"]];

$problems_constrains = [["INT(6)", "UNSIGNED AUTO_INCREMENT", "PRIMARY KEY"],
    ["VARCHAR(30)", "NOT NULL"], ["VARCHAR(60)", "NOT NULL"],
    ["INT(1)", "NOT NULL"],["INT(6)","UNSIGNED", "NOT NULL"],
    ["INT(9)", "NOT NULL","DEFAULT 0"],
    ["INT(1)", "NOT NULL"],["INT(1)", "NOT NULL"],
    ["($problems_columns[4]) REFERENCES contests($contests_columns[0])"]];

$submissions_constrains = [["INT(6)", "UNSIGNED AUTO_INCREMENT", "PRIMARY KEY"],
    ["INT(6)","UNSIGNED","NOT NULL"], ["INT(6)","UNSIGNED", "NOT NULL"],
    ["VARCHAR(30)", "NOT NULL"], ["VARCHAR(30)", "NOT NULL"],
    ["($submissions_columns[1]) REFERENCES problems($problems_columns[0])"],
    ["($submissions_columns[2]) REFERENCES users($users_columns[0])"]];

$users_in_contests_constrains = [
    ["INT(6)", "UNSIGNED", "NOT NULL"], ["INT(6)","UNSIGNED","NOT NULL"],
    ["($users_in_contests_columns[0], $users_in_contests_columns[1])"],
    ["($users_in_contests_columns[0]) REFERENCES users($users_columns[0])"],
    ["($users_in_contests_columns[1]) REFERENCES contests($contests_columns[0])"]];



$all_names = ["users", "contests", "problems", "submissions", "users_in_contests"];

TableClass::set_sql_connection(get_pdo_sql_connection());

foreach ($all_names as $table_name) {
    $__constrains = $table_name . "_constrains";
    $__columns = $table_name . "_columns";
    $table = new TableClass($table_name, $$__columns, $$__constrains);
    $return_value = $table->create();
    if ($return_value != 0) {
        echo "Something went wrong";
        exit($return_value);
    }
}
