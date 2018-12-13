<?php


function get_sql_connection()
{
    /*DONT FORGET TO CLOSE THE CONNECTION USING STATEMENT OBJECT_NAME->close();*/
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ojDB";

	$conn = new mysqli($servername, $username, $password, $dbname);//connect to database

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	return $conn; //return rhe connection object

}

function my_print($string){
    echo $string;
    echo "<br>";
}

function get_problem_time_limit_from_database($problem_id){
	$connection = get_sql_connection(); //getting the connection object
    $sql = "SELECT time_limit FROM problems WHERE problem_id = $problem_id"; //prepare the sql statement
    $result = $connection->query($sql); //execute the sql statement and get the result object
    if ($result->num_rows > 0) { // by the way this sql statement should return only 1 row because problem_id is UNIQUE
        // output data of each row
        while($row = $result->fetch_assoc()) { //fetching data from result object row by row
            return $row["time_limit"]; //return the time limit of rhe problem
        }
    } else {
        return 0; //if there is no time limit stored on database (for safety)
    }
    $connection->close(); //closing the connection
}

$source_code_name = __DIR__ . "/../source_codes/" . $submission_id;
$object_file_name = __DIR__ . "/../source_codes/" . "a.out";

$compilation_flags = " -static -DONLINE_JUDGE -lm -s -x c++ -O2 -std=c++11 ";
$command = "g++ " . $compilation_flags . $source_code_name . " -o " . $object_file_name;

exec($command, $output, $compilation_state);

if($compilation_state){ // compile success if (compilation_state == 0)
    echo "compilation FAILED";
    return(1);
}

$problem_id = $_POST['problem_id']; # get problem ID form link 

// add_submission_to_database();

$problem_directory = __DIR__ . "/../problems_db/" . $problem_id;

$problem_dir_tests = $problem_directory . "/number_of_test_cases.txt";
$problem_dir_in_out = $problem_directory . "/test_cases/";
$problem_dir_my_out = $problem_directory . "/test_cases/my_out/";


if (!file_exists($problem_dir_my_out) && !is_dir($problem_dir_my_out)) {
    mkdir($problem_dir_my_out);
} 

$test_cases = file_get_contents($problem_dir_tests);

$problem_time_limit = get_problem_time_limit_from_database($problem_id);

$in_container_command = "\"./tester; exit $?\""; 
// append the time limit as $TLE so that it can be read inside the container 
// use system function to execute timeout $TLE (inside c++ tester)

$docker_run = "docker run --rm -v ~/codecourses/judge_tester/:/tester -v ~/codecourses/problems_db/" . $problem_id . "/:/problem -v ~/codecourses/source_codes/:/source_codes kerolloz/codecourses_judge:latest codecourses_judge " . $problem_time_limit;

exec($docker_run, $out, $return_value);

switch ($return_value) {
	case 0:
		my_print("ACCEPTED");
		break;
	case 1:
		my_print("WRONG ANSWER");
		break;
	case -1:
		my_print("NOT JUDGED - SOMETHING WENT WRONG INNER_TESTER");
		break;
	case 124:
		my_print("TIME LIMIT EXCEEDED");
		break;
	default:
		my_print("CONTAINER DIDN'T EXIT PROPERLY");
		break;
}


return;