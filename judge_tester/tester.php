<?php

# WARNING: This is just a very basic tester!!!
# should be integrated with docker

function my_print($string){
    echo $string;
    echo "<br>";
}

$source_code_name = __DIR__ . "/../source_codes/" . $submission_id;
my_print($source_code_name);

$command = "g++ " . $source_code_name;
my_print($command);
exec($command, $output, $compilation_state);
my_print($compilation_state);

if($compilation_state){ // compile success if (compilation_state == 0)
    echo "compilation FAILED";
    return(1);
}

$problem_id = $_POST['problem_id']; # get problem ID form link 
echo $problem_id;

// add_submission_to_database();

$submissions_dir = __DIR__ . "/../problems_db/" . $problem_id . "/number_of_test_cases.txt";

$submissions_dir_input = __DIR__ . "/../problems_db/" . $problem_id . "/test_cases/";
$submissions_dir_output = __DIR__ . "/../problems_db/" . $problem_id . "/test_cases/";
$submissions_dir_my_out = __DIR__ . "/../problems_db/" . $problem_id . "/test_cases/my_out/";

mkdir($submissions_dir_my_out);

$test_cases = file_get_contents($submissions_dir);

my_print($test_cases . " test cases");
echo "<br>";
for($i = 1; $i <= $test_cases; $i++){
    $input_file = $submissions_dir_input . $i .".in";
    exec("./a.out < " . $input_file . " > " . $submissions_dir_my_out . $i . ".out"); 
    // the previous line should be replaced wiith docker
    $diff_command = "diff -s -q -Z " . $submissions_dir_my_out  . $i . ".out " . $submissions_dir_output . $i . ".out";
    exec($diff_command, $ot, $ret_val);
    if($ret_val == 0) my_print("OKay test " . $i);
    else {my_print("ERROR ON TEST " . $i); my_print("WRONG ANSWER"); return;}
}

my_print("ACCEPTED");
return;