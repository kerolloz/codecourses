<?php

require_once '../back/database_connection.php';

// Create connection
$conn = get_sql_connection();

$sql = "SELECT
submissions.*,
users.username AS user_name,
problems.name AS problem_name
FROM ((submissions
INNER JOIN problems ON submissions.problem_id = problems.problem_id)
INNER JOIN users ON submissions.user_id = users.user_id)
ORDER BY submission_id DESC
";

?>

<!doctype html>
<html>

<head>
    <title>Submissions</title>
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
                        <th> User </th>
                        <th> Problem Name </th>
                        <th> Status </th>
                        <th> Langage </th>
                    </tr>

                    <?php
                            $result = $conn->query($sql);
                            if (isset($result->num_rows) && $result->num_rows > 0) { // by the way this sql statement should return only 1 row because problem_id is UNIQUE
                                // output data of each row
                                while($row = $result->fetch_assoc()) { //fetching data from result object row by row
                                    ?>
                    <tr>
                        <td>
                            <?= $row['submission_id'] ?>
                        </td>
                        <td>
                            <?= $row['user_name'] ?>
                        </td>
                        <td> <a href="../problem/?id=<?= $row['problem_id'] ?>">
                                <?= $row['problem_name'] ?></a> </td>
                        <td>
                            <?= $row['status'] ?>
                        </td>
                        <td>
                            <?= $row['sol_language'] ?>
                        </td>
                    </tr>
                    <?php
                                }
                            }else{echo "<tr>
                            <td class='text-lg-center' colspan='6'>
                            NO AVAILABLE SUBMISSIONS
                            </td>
                            </tr>";
                            }

                        ?>



                </table>
            </div>
        </div>

        <?php require '../footer_include.php'; ?>

    </div>

</body>

</html>
