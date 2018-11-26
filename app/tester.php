<?php

# WARNING: This is just a very basic tester!!!
function my_print($string){
    echo $string;
    echo "<br>";
}

$source_code_name = __DIR__ . "/" . $_FILES["my_file"]["name"];
my_print($source_code_name);

$command = "g++ " . $source_code_name;
my_print($command);
exec($command, $output, $compilation_state);
my_print($compilation_state);

if($compilation_state){ // compile success if (compilation_state == 0)
    echo "compilation FAILED";
    exit(1);
}

$submissions_dir = "./476_44427781/number_of_testcases.txt";

$submissions_dir_input = "./476_44427781/in/";
$submissions_dir_output = "./476_44427781/out/";
$submissions_dir_my_out = "./476_44427781/my_out/";

mkdir("./476_44427781/my_out");

$test_cases = file_get_contents($submissions_dir);

my_print($test_cases);

for($i = 1; $i <= $test_cases; $i++){
    $input_file = $submissions_dir_input . "in" .$i .".txt";
    exec("./a.out < " . $input_file . " > " . $submissions_dir_my_out . "my_out" . $i . ".txt");
    $diff_command = "diff -s -q -Z " . $submissions_dir_my_out . "my_out" . $i . ".txt " . $submissions_dir_output . "out" . $i . ".txt";
    exec($diff_command, $ot, $ret_val);
    if($ret_val == 0) my_print("OKay test " . $i);
    else my_print("ERROR ON TEST " . $i);
}

