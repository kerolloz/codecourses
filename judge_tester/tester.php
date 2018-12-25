<?php

require '../back/database_connection.php';

function my_print($string)
{
	echo $string;
	echo "<br>";
}

$source_code_name = __DIR__ . "/../source_codes/" . $submission_id;
$object_file_name = __DIR__ . "/../source_codes/" . "a.out";

$compilation_flags = " -static -DONLINE_JUDGE -lm -s -x c++ -O2 -std=c++11 ";
$command = "g++ " . $compilation_flags . $source_code_name . " -o " . $object_file_name;

exec($command, $output, $compilation_state);

if($compilation_state){ // compile success if (compilation_state == 0)
    $return_value = -1;
    return $return_value;
}

$sql_connection = get_sql_connection();

$problem_id = $_GET['id']; // get problem ID form link 
$problem_details = get_problem_details_from_database($problem_id, $sql_connection);
$problem_time_limit = $problem_details['time_limit'];
$problem_memory_limit = $problem_details['memory_limit'];
close_sql_connection($sql_connection);

$problem_directory = __DIR__ . "/../problems_db/" . $problem_id;

$problem_dir_tests = $problem_directory . "/number_of_test_cases.txt";
$problem_dir_in_out = $problem_directory . "/test_cases/";
$problem_dir_my_out = $problem_directory . "/test_cases/my_out/";


if (!file_exists($problem_dir_my_out) && !is_dir($problem_dir_my_out)) {
    mkdir($problem_dir_my_out);
} 

$test_cases = file_get_contents($problem_dir_tests);


$docker_run = "docker run --rm -v ~/codecourses/judge_tester/:/tester -v ~/codecourses/problems_db/" . $problem_id . "/:/problem -v ~/codecourses/source_codes/:/source_codes kerolloz/codecourses_judge:latest codecourses_judge " . $problem_time_limit;

exec($docker_run, $out, $return_value);

return $return_value;

