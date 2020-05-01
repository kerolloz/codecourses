<?php

$source_code_name = __DIR__ . "/../source_codes/$submission_id.cpp";
$object_file_name = __DIR__ . "/../source_codes/$submission_id.out";

$compilation_flags = " --static -lm -s -x c++ -O2 -std=c++17 ";
$command = "g++ $compilation_flags  $source_code_name -o $object_file_name";

exec($command, $output, $compilation_state);

if ($compilation_state == 0) {
    // success
    $sql_connection = get_sql_connection();

    $problem_id = $_GET['id']; // get problem ID form link
    $problem_details = get_problem_details_from_database($problem_id, $sql_connection);
    $problem_time_limit = $problem_details['time_limit'];
    $problem_memory_limit = $problem_details['memory_limit'];

    close_sql_connection($sql_connection);

    $problem_dir = __DIR__ . "/../problems_db/" . $problem_id;
    $source_codes_dir = __DIR__ . "/../source_codes/";

    $docker_run = "docker run --rm";
    $docker_run .= " -v $problem_dir:/problem:ro "; // ro = read only
    $docker_run .= " -v $source_codes_dir:/source_codes:ro ";
    $docker_run .= "kerolloz/codecourses_judge:latest codecourses_judge $problem_time_limit $submission_id";
    $docker_run .= ' 2>&1';
    exec($docker_run, $out, $return_value);


} else {
    $return_value = -1; // compilation error
}

$verdict = "";

switch ($return_value) {
    case 0:
        $verdict = "accepted";
        increment_number_of_solvers($_POST['problem_id'], $conn);
        break;
    case 1:
        $verdict = "wrong answer";
        break;
    case -1:
        $verdict = "compilation error";
        break;
    case 124:
        $verdict = "time limit exceeded";
        break;
    case 16:
        $verdict = "File Error";
        break;
    default:
        $verdict = "JUDGE ERROR";
        break;
}

change_submission_status($submission_id, $verdict, $conn);

return $return_value;
