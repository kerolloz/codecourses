<?php

session_start();
require '../back/database_connection.php';

// Create connection
$conn = get_sql_connection();

$contest_id = filter_var($_GET['id'], FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
if(!$contest_id)
    header("location: /codecourses/errors/404.html");

?>

<!doctype html>
<html>

<head>
    <title>Standings</title>
    <link rel="stylesheet" href="../assets/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/codecourses/styles/style.css">
    <link rel="stylesheet" href="style.css">

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
                        <th class="underline"><a href="#"><?= $problem_character++ ?></a></th>
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
                                ?>

                        <td class="<?=($is_solved)? "accepted":"wrong"?>"> <?= ($is_solved)? "YES":"NO" ?> </td>
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
