<?php

if (isset($_POST)):
    try {
        $dbh = get_pdo_sql_connection();
        $sql_stmnt = "INSERT INTO problems (name, level, contest_id, time_limit, memory_limit) VALUES (:name, :level, :contest_id, :time_limit, :memory_limit)";
        $stmt = $dbh->prepare($sql_stmnt);
        $stmt->bindParam(':name', $_POST['problem_name']);
        $stmt->bindParam(':level', $_POST['problem_level']);
        $stmt->bindParam(':contest_id', $_POST['contest_id']);
        $stmt->bindParam(':time_limit', $_POST['time_limit']);
        $stmt->bindParam(':memory_limit', $_POST['memory_limit']);
        $stmt->execute();
        $last_problem_id = $dbh->lastInsertId();
        $dbh = null;
    } catch (PDOException $e) {
        $Error = "Error!: " . $e->getMessage() . "<br/>";
    }

    mkdir("../problems_db/".$last_problem_id);
    $cmd = "mv " . __DIR__ . "/python-api/problem.pdf ". __DIR__ . "/../problems_db/" . $last_problem_id . "/";
    exec($cmd, $out, $ret_val);

    if ($_POST['download_test_cases_submission_folder_name']) {
        $from = __DIR__ . '/../admin_dashboard/' . $_POST['download_test_cases_submission_folder_name'] . "/*";
        $to   = __DIR__ . "/../problems_db/" . $last_problem_id . "/";
        $cmd = "mv $from $to";
        exec($cmd, $out, $ret_val);
        $from = __DIR__ . '/../admin_dashboard/' . $_POST['download_test_cases_submission_folder_name'];
        exec("rm -r $from");
    }

endif;
