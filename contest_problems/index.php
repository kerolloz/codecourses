<?php
session_start();
require '../back/database_connection.php';

// Create connection
$conn = get_sql_connection();

$contest_id = filter_var($_GET['id'], FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
if (!$contest_id) {
    header("location: /codecourses/errors/404.html");
}


if (!did_contest_start($contest_id, $conn)) {
    echo "
    <script>
    alert('The contest has NOT started yet!');
    history.go(-1);
    </script>
    ";
    return;
}

if (!is_user_registered_at_contest($_SESSION['user_id'], $contest_id, $conn)) {
    echo "
    <script>
    alert('You are NOT registered at this contest!');
    history.go(-1);
    </script>
    ";
    return;
}

$sql = "SELECT * FROM problems WHERE contest_id = $contest_id" ;

$accepted_img_dir = "../assets/images/ok.png";
$wrong_answer_img_dir = "../assets/images/wrong.png";

?>
<!doctype html>
<html>

<head>
    <title>Contest Problems</title>
    <link rel="stylesheet" href="../assets/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/style.css">

    <link rel="stylesheet" href="style.css">

    <link rel="script" href="../assets/bootstrap-4.1.3-dist/js/bootstrap.min.js">
    <script src="../scripts/script.js"></script>
</head>

<body>

    <!--include navigation bar from a preset php file-->
    <?php require "../navbar_control.php";?>

    <!-- Problems In Contest Section -->
    <div class="color">
        <div class="tableWidth">

            <div class="table-responsive">

                <table class="table table-dark table-striped table-bordered">

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
                                while ($row = $result->fetch_assoc()) :
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
                            } else {
                                echo "$wrong_answer_img_dir" ;
                            }
                             ?>
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
                        ?>



                </table>

            </div>

            <div class="countDownTable">

                <table class="table table-dark table-bordered table-striped">

                    <tr>
                        <th> <span class="badge badge-danger">Countdown!</span> </th>
                    </tr>

                    <tr>
                        <td>
                            <h5 id="countDown"><img src="../assets/images/loading.gif" width="50"></h5>
                        </td>


                    </tr>
                    <tr>
                        <td>
                            <h4 class="href"><a href="../standings/?id=<?= $contest_id ?>">Standings</a></h4>

                        </td>
                    </tr>

                </table>

            </div>


        </div>
        <?php
        $sql = "SELECT date, length from contests WHERE contest_id=$contest_id";
        $result = $conn->query($sql);
        $var = "";
        if ($result->num_rows > 0) :
            $var = $result->fetch_assoc();
        endif;
        echo <<<EOF
        <script>
         countDownDate = new Date().setMinutes(new Date("$var[date]").getMinutes() + $var[length]);

         // Update the count down every 1 second
         var x = setInterval(function() {

             // Get todays date and time
             var now = new Date().getTime();

             // Find the distance between now and the count down date
             var distance = countDownDate - now;

             // Time calculations for days, hours, minutes and seconds
             var days = Math.floor(distance / (1000 * 60 * 60 * 24));
             var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
             var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
             var seconds = Math.floor((distance % (1000 * 60)) / 1000);

             // Display the result in the element with id="demo"
             document.getElementById("countDown").innerHTML = hours + "h " +
                 minutes + "m " + seconds + "s ";

             // If the count down is finished, write some text
             if (distance < 0) {
                 clearInterval(x);
                 document.getElementById("countDown").innerHTML = "Contest Is Over!";
             }
         }, 1000);
        </script>
EOF;

        close_sql_connection($conn);

        ?>

        <?php require '../footer_include.php'; ?>

    </div>

</body>

</html>
