<?php

session_start();
require '../back/database_connection.php';

// Create connection
$conn = get_sql_connection();

$contest_id = filter_var($_GET['id'], FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
if(!$contest_id)
    header("location: /codecourses/errors/404.html");

$page = $_SERVER['PHP_SELF'] . "?id=$contest_id";
$refresh_perioud = 3;

?>

<!doctype html>
<html>

<head>
    <title>Standings</title>
    <link rel="stylesheet" href="../assets/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/codecourses/styles/style.css">
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="refresh" content="<?= $refresh_perioud ?>;URL='<?= $page ?>'">

    <link rel="script" href="../assets/bootstrap-4.1.3-dist/js/bootstrap.min.js">
    <script src="../scripts/script.js"></script>
</head>

<body>
    <!--include navigation bar from a preset php file-->
    <?php require "../navbar_control.php";?>

    <div class="color">
        <div class="tableWidth">
            <div class="table-responsive">

                <table class="table table-dark table-striped table-bordered">
                    <tr>
                        <th> # </th>
                        <th> Participant </th>
                        <?php
                            $sql = "SELECT * FROM problems WHERE contest_id=" . $contest_id;

    							$problems_result = $conn->query($sql);

    							if ($problems_result->num_rows > 0) :
    								// output data of each row
    								$problem_character = "A";
    								while($problem_row = $problems_result->fetch_assoc()) :
    							?>
                        <th class="underline"><a href="../problem?id=<?= $problem_row['problem_id'] ?>"><?= $problem_character++ ?></a></th>
                        <?php
                    endwhile;
                endif;
                         ?>
                    </tr>

                        <?php
                        $sql = "SELECT users.* from users, users_in_contests WHERE users_in_contests.contest_id = $contest_id and users.user_id = users_in_contests.user_id";

    							$users_result = $conn->query($sql);

    							if ($users_result->num_rows > 0) :
    								// output data of each row
    								$user_number = 1;
    								while($user_row = $users_result->fetch_assoc()) :
    							?>
                    <tr>
                        <td> <?= $user_number++ ?>  </td>
                        <td> <?= $user_row["username"] ?> </td>
                        <?php
                        $sql = "SELECT * from problems WHERE contest_id = $contest_id";

                                $submissions_result = $conn->query($sql);

                                if ($submissions_result->num_rows > 0) :
                                    // output data of each row
                                    while($submission_row = $submissions_result->fetch_assoc()) :
                                        $is_solved = is_solved_for_user($submission_row['problem_id'], $user_row['user_id'], $conn);
                                        $number_of_submissions = get_number_of_submissions_for_user_in_problem($user_row['user_id'], $submission_row['problem_id'], $conn);
                                        $is_wrong_answer = (!$is_solved && $number_of_submissions)? true: false;
                                        $output = ($number_of_submissions && $is_solved)? "+": "";
                                        $output .= ($number_of_submissions && $is_wrong_answer)? "-": "";
                                        $output .= ($number_of_submissions)? $number_of_submissions: "";
                                        $class_style = "";
                                        if($is_solved) $class_style = "accepted";
                                        else if($is_wrong_answer) $class_style = "wrong";
                                        if($is_solved && $number_of_submissions == 1) $output = "+";

                                ?>

                        <td class="<?= $class_style ?>"> <?= $output ?> </td>
                        <?php
                        endwhile;
                        endif;
                         ?>

                    </tr>
                        <?php
                    endwhile;
                endif;
                         ?>



                </table>
            </div>
        </div>

        <?php require '../footer_include.php'; ?>

    </div>

</body>

</html>
