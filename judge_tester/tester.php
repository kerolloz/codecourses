<?php

# WARNING: This is just a very basic tester!!!
# should be integrated with docker

function my_print($string){
    echo $string;
    echo "<br>";
}

$source_code_name = __DIR__ . "/../source_codes/" . $submission_id;
$object_file_name = __DIR__ . "/../source_codes/" . "a.out";

$compilation_flags = " -static -DONLINE_JUDGE -lm -s -x c++ -Wl,--stack=268435456 -O2 -std=c++11 ";
$command = "g++ " . $compilation_flags . $source_code_name . " -o " . $object_file_name;
exec($command, $output, $compilation_state);

if($compilation_state){ // compile success if (compilation_state == 0)
    echo "compilation FAILED";
    return(1);
}

$problem_id = $_POST['problem_id']; # get problem ID form link 

// add_submission_to_database();

$submissions_dir = __DIR__ . "/../problems_db/" . $problem_id . "/number_of_test_cases.txt";

$submissions_dir_input = __DIR__ . "/../problems_db/" . $problem_id . "/test_cases/";
$submissions_dir_output = __DIR__ . "/../problems_db/" . $problem_id . "/test_cases/";
$submissions_dir_my_out = __DIR__ . "/../problems_db/" . $problem_id . "/test_cases/my_out/";


if (!file_exists($submissions_dir_my_out) && !is_dir($submissions_dir_my_out)) {
    mkdir($submissions_dir_my_out);
} 

$test_cases = file_get_contents($submissions_dir);

for($i = 1; $i <= $test_cases; $i++){
    $input_file = $submissions_dir_input . $i .".in";
    exec($object_file_name . " < " . $input_file . " > " . $submissions_dir_my_out . $i . ".out"); 
    // the previous line should be replaced wiith docker
    $diff_command = "diff -s -q -Z " . $submissions_dir_my_out  . $i . ".out " . $submissions_dir_output . $i . ".out";
    exec($diff_command, $ot, $ret_val);
    if($ret_val == 0) my_print("OKay test " . $i);
    else {my_print("ERROR ON TEST " . $i); my_print("WRONG ANSWER"); return;}
}

my_print("ACCEPTED");

return;