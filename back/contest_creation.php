<?php
$user = "root";
$pass = "";

if(isset($_POST)):
	try {
		$dbh = new PDO('mysql:host=localhost;dbname=ojDB', $user, $pass);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql_stmnt = "INSERT INTO contests (name, date, length, setter) VALUES (:name, :date, :length, :setter)";
		$stmt = $dbh->prepare($sql_stmnt);
		$date = $_POST['contest_date'] . " " . $_POST['contest_time'];
	    $stmt->bindParam(':name', $_POST['contest_name']);
	    $stmt->bindParam(':date', $date);
	    $stmt->bindParam(':length', $_POST['contest_length']);
	    $stmt->bindParam(':setter', $_POST['contest_setter']);
		$stmt->execute();
	    $dbh = null;
	} catch (PDOException $e) {
	    $Error = "Error!: " . $e->getMessage() . "<br/>";
	}
endif;