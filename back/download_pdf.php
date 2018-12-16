<?php

$link = $_POST['pdf_problem_link'];
echo "$link";
$command = ' python3 problem-cutter.py ' . $link . " test.pdf  2>&1";
echo $command;
exec($command, $output, $return_value);
foreach ($output as $key => $value) {
	echo $key . " -> " . $value . "<br>";
}
echo "<br>$return_value";