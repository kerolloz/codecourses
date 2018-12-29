<?php
session_start();
$_SESSION['standing'] = true;

require '../back/database_connection.php';

// Create connection
$conn = get_sql_connection();

$contest_id = filter_var($_GET['id'], FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
if(!$contest_id)
    header("location: /codecourses/errors/404.html");
$sql = "SELECT * FROM problems WHERE contest_id=" . $contest_id;

$accepted_img_dir = "../assets/images/ok.png";
$wrong_answer_img_dir = "../assets/images/wrong.png";

?>
<!doctype html>
<html>

<head>
    <title>ProblemsInContest</title>
    <link rel="stylesheet" href="../assets/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/style.css">

    <link rel="stylesheet" href="style.css">

    <link rel="script" href="../assets/bootstrap-4.1.3-dist/js/bootstrap.min.js">
    <script src="script.js"></script>
    <script src="../scripts/script.js"></script>
</head>

<body>

    <!--include navigation bar from a preset php file-->
    <?php require "../navbar_control.php";?>

    <!-- Problems In Contest Section -->
    <div class="color">
        <div class="tableWidth">

            <div class="table-responsive">

                <table class="table table-dark  table-striped  table-bordered">

                    <tr>
                        <th> # </th>
                        <th> Name </th>
                        <th> <img src="/codecourses/assets/images/user.png"> </th>
                        <th> Status </th>
                    </tr>

                    <?php
							$result = $conn->query($sql);

							if ($result->num_rows > 0) :
								// output data of each row
								$problem_character = "A";
								while($row = $result->fetch_assoc()) :
							?>
                    <tr>
                        <td>
                            <?= $problem_character++ ?>
                        </td>
                        <td> <a href="/codecourses/problem?id=<?= $row['problem_id'] ?>">
                                <?= $row['name'] ?> </a> </td>
                        <td>
                            <?= $row['number_of_solvers'] ?>
                        </td>
                        <td>
                            <img src=
                            <?php
                            if (isset($_SESSION['user_id']) && is_solved_for_user($row['problem_id'], $_SESSION['user_id'], $conn)) {
                                 # code...
                                 echo "$accepted_img_dir" ;
                             }
                             else{
                                 echo "$wrong_answer_img_dir" ;
                             }
                             ?>
                            style="width:16px;height:16px;">
                        </td>
                    </tr>
                    <?php
							endwhile;

						else:
							echo "<pre><br>NO PROBLEMS IN THIS CONTEST</pre>";
						endif;
						$conn->close();
						?>



                </table>

            </div>

            <div class="countDownTable">

                <table class="table table-dark table-bordered table-striped">

                    <tr>
                        <th> <span class="badge badge-danger"> CountDown !</span> </th>
                    </tr>

                    <tr>
                        <td>
                            <p id="countDown"> </p>
                        </td>
                    </tr>

                </table>
            </div>

        </div>

        <div id="footer">
            &copy 2018 CodeCourses.com | All Rights Reserved
        </div>
    </div>

</body>

</html>
