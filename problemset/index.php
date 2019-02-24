<?php


require '../back/database_connection.php';

// Create connection
$conn = get_sql_connection();

$sql = "SELECT problems.* from problems, contests WHERE contests.date < NOW() and contests.contest_id=problems.contest_id";

$accepted_img_dir = "../assets/images/ok.png";
$wrong_answer_img_dir = "../assets/images/wrong.png";

?>
<!doctype html>
<html>

<head>
    <title>ProblemSet</title>

    <link rel="stylesheet" href="../assets/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="script" href="../assets/bootstrap-4.1.3-dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="style.css">

    <script src="../scripts/script.js"></script>

</head>

<body>

    <!--include navigation bar from a preset php file-->
    <?php require "../navbar_control.php";?>



    <!-- ProblemSection -->
    <div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-dark">
                <tr>
                    <th class="topLeftRad"> Name </th>
                    <th>Level</th>
                    <th> <img src="/codecourses/assets/images/user.png"> </th>
                    <th class="topRightRad"> Status </th>
                </tr>

                <?php
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) :
                        // output data of each row
                        while ($row = $result->fetch_assoc()) :
                    ?>
                <tr>
                    <td><a href="/codecourses/problem?id=<?= $row['problem_id'] ?>">
                            <?= $row['name'] ?>
                    </td>
                    <?php
                                switch ($row['level']) {
                                    case 1:
                                        echo "<td><span class='badge badge-success'>Beginner </span></td>";
                                        break;
                                    case 2:
                                         echo "<td><span class='badge badge-success'>Intermediate </span></td>";
                                         break;
                                    case 3:
                                        echo "<td><span class='badge badge-success'>Advanced </span></td>";
                                        break;
                                    default:
                                        break;
                                }
                                ?>
                    <td>
                        <?= $row['number_of_solvers'] ?>
                    </td>
                    <td>
                        <img src=<?php if (isset($_SESSION['user_id']) && is_solved_for_user($row['problem_id'], $_SESSION['user_id'], $conn)) {
                                    echo "$accepted_img_dir" ;
                                } else {
                                    echo "$wrong_answer_img_dir" ;
                                } ?>
                        style="width:16px;height:16px;">
                    </td>
                </tr>
                <?php
                        endwhile;

                        else:
                            echo "<tr>
                            <td class='text-lg-center' colspan='6'>
                            NO AVAILABLE PROBLEMS
                            </td>
                            </tr>";
                        endif;
                        close_sql_connection($conn);
                    ?>
            </table>
        </div>

        <?php require '../footer_include.php'; ?>

    </div>

</body>

</html>
