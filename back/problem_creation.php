<?php
$user = "root";
$pass = "";

if(isset($_POST)):
	try {
		$dbh = new PDO('mysql:host=localhost;dbname=ojDB', $user, $pass);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql_stmnt = "INSERT INTO problems (name, level, contest_id, time_limit, memory_limit) VALUES (:name, :level, :contest_id, :time_limit, :memory_limit)";
		$stmt = $dbh->prepare($sql_stmnt);
	    print_r($_POST);
	    $stmt->bindParam(':name', $_POST['problem_name']);
	    $stmt->bindParam(':level', $_POST['problem_level']);
	    $stmt->bindParam(':contest_id', $_POST['contest_id']);
	    $stmt->bindParam(':time_limit', $_POST['time_limit']);
	    $stmt->bindParam(':memory_limit', $_POST['memory_limit']);
		$stmt->execute();
	    $dbh = null;
	    echo "Contest created successfully";
	} catch (PDOException $e) {
	    print "Error!: " . $e->getMessage() . "<br/>";
	    die();
	}
endif;