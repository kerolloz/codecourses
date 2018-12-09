<?php

# WARNING: This is just a very basic tester!!!
# should be integrated with docker
# lacks timeout & sandboxing "isolation of the running process"

function my_print($string){
    echo $string;
    echo "<br>";
}

$source_code_name = __DIR__ . "/" . $submission_id;
my_print($source_code_name);

$command = "g++ -static -DONLINE_JUDGE -lm -s -x c++ -O2 -std=c++11 " . $source_code_name;
my_print($command);
exec($command, $output, $compilation_state);
my_print($compilation_state);

if($compilation_state){ // compile success if (compilation_state == 0)
    echo "compilation FAILED";
    return(1);
}

$test_cases_dir = "jolly-jumpers"; // just for testing, should be replaced according to the problem id

$submissions_dir = "./" . $test_cases_dir . "/number_of_testcases.txt";

$submissions_dir_input = "./" . $test_cases_dir . "/in/";
$submissions_dir_output = "./" . $test_cases_dir . "/out/";
$submissions_dir_my_out = "./" . $test_cases_dir . "/my_out/";
$my_out_dir = "./" . $test_cases_dir . "/my_out";

if(!file_exists($my_out_dir) && !is_dir($my_out_dir))
	mkdir($my_out_dir);

$test_cases = file_get_contents($submissions_dir);

my_print($test_cases . " test cases");
echo "<br>";
for($i = 1; $i <= $test_cases; $i++){
    $input_file = $submissions_dir_input .$i .".in";
    exec("./a.out < " . $input_file . " > " . $submissions_dir_my_out . "my_out" . $i . ".out"); 
    // the previous line should be replaced wiith docker
    $diff_command = "diff -s -q -Z " . $submissions_dir_my_out . $i . ".out " . $submissions_dir_output . $i . ".out";
    exec($diff_command, $ot, $ret_val);
    if($ret_val == 0) my_print("OKay test " . $i);
    else {my_print("ERROR ON TEST " . $i); my_print("WRONG ANSWER"); return;}
}

my_print("ACCEPTED");
return;