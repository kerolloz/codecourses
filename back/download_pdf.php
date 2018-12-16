<?php

$link = $_POST['pdf_problem_link'];
echo "$link";
$command = "which python3;  python3 problem-cutter.py " . $link . " test.pdf  2>&1";
echo $command;
exec($command, $output, $return_value);

print_r($output);
echo "<br>$return_value";