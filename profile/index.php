<?php


if(!isset($_SESSION))
    session_start();
if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true):
    require '../back/database_connection.php';
    // Create connection
    $conn = get_sql_connection();
else:
    header("location: ../authentication/");
endif;


?>
<!doctype html>
<html>
<head>
    <title>Profile</title> <!--Should be the same as username-->

    <!--Required meta tags for BS-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--BS CSS-->
    <link rel="stylesheet" href="../assets/bootstrap-4.1.3-dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../assets/bootstrap-4.1.3-dist/css/bootstrap.min.css">

    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Text+Me+One" rel="stylesheet">

    <!--Standard CSS -->
    <link rel="stylesheet" href="../styles/style.css">
    <!--Custom CSS-->
    <link rel="stylesheet" href="style.css">
</head>

<body>

<!--include navigation bar from a preset php file-->
<?php require $_SERVER['DOCUMENT_ROOT'] . "/codecourses/navbar_control.php";?>

<div class="color">
    <div class="container profile-container">
        <div class="row">
            <div class="col-4">
                <div class="card profile-card">
                    <div class="card-body">
                        <div class="avatar">
                            <img src="../assets/images/avatar.jpg" width="100px" height="100px"><br>
                            <?php
                            if(!isset($_SESSION))
                                session_start();
                            if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true):
                                ?>
                                <h3><?= $_SESSION['fname']?></h3><br>
                            <?php else :?>
                                <h3>User</h3><br>
                            <?php endif ?>
                            <label>“ We cannot solve our problems with the same thinking that created them.”</label>
                        </div>

                        <div class="profile-linewrapper">
                            <div onclick="submission()">
                                <img src="../assets/images/laptop.png" width="15px" height="18px">
                                <label>Submissions</label>
                            </div>

                            <!--<div onclick="myprofile()">
                                <img src="../assets/images/person.png" width="15px" height="15px">
                                <label>My Profile</label>
                            </div>

                            <div onclick="tutorials()">
                                <img src="../assets/images/book.jpg" width="17px" height="17px">
                                <label>Tutorials</label>
                            </div>
                            -->
                            <div class="profile-logout">
                                <img src="../assets/images/logout.png" width="17px" height="17px">
                                <label><a href="../back/logout.php">Logout</a></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="submission-card" class="col-7">
                <div class="card details-card">
                    <div class="card-body">
                        <div class="row row-div">

                            <?php
                            //sql statement that join two tables and get all accepted submisssions to that user
                            $sql = "SELECT submissions.problem_id,status,level,name  FROM submissions,problems WHERE submissions.problem_id = problems.problem_id AND user_id = ".$_SESSION['user_id']." AND status = 'accepted'";
                            $accepted_submissions = $conn->query($sql);
                            //sql statement that join two tables and get all that not accepted submisssions to that user
                            $sql2 = "SELECT submissions.problem_id,status,level,name  FROM submissions,problems WHERE submissions.problem_id = problems.problem_id AND user_id = ".$_SESSION['user_id']." AND NOT  status = 'accepted'";
                            $wrong_submissions = $conn->query($sql2);
                            //dictionary to make the levels deceptive
                           $levels = array(1=>"Beginner",2=>"Intermediate",3=>"Advanced");

                            ?>
                            <div class="col-4 tried-col" onclick="sub_tried()">
                                <h4>Tried</h4>
                                <span>
                                  <?php if($wrong_submissions && $accepted_submissions)
                                          echo ($wrong_submissions->num_rows + $accepted_submissions->num_rows);
                                        else {
                                          echo 0;
                                        }
                                 ?>
                               </span>
                            </div>
                            <div id="solved-col" class="col-4 solved-col" onclick="sub_solved()">
                                <h4>Solved</h4>
                                <span>
                                  <?php if($accepted_submissions)
                                          echo ($accepted_submissions->num_rows);
                                        else {
                                          echo 0;
                                        }
                                  ?>
                                </span>
                            </div>
                            <div id="notsolved-col" class="col-4 notsolved-col" onclick="sub_notsolved()">
                                <h4>Not solved</h4>
                                <span>
                                  <?php if($wrong_submissions)
                                        echo ($wrong_submissions->num_rows);
                                      else {
                                        echo 0;
                                      }
                               ?>
                             </span>
                            </div>
                        </div>

                        <div id="tried-table">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                </tr>
                                <?php
                                if (isset($accepted_submissions->num_rows) && $accepted_submissions->num_rows > 0) :
                                    // output data of each row
                                    while($row = $accepted_submissions->fetch_assoc()) :
                                        ?>
                                        <tr>
                                            <td><?= $row['problem_id'] ?></td>
                                            <td><a href="#"><?= $row['name'] ?></a></td>
                                            <td><span class="badge badge-success"><?= $levels[$row['level']] ?></span></td>
                                            <td><?= $row['status'] ?></td>
                                        </tr>
                                    <?php
                                    endwhile;

                                endif;
                                ?>
                                <?php
                                if (isset($wrong_submissions->num_rows) &&$wrong_submissions->num_rows > 0) :
                                    // output data of each row
                                    while($row = $wrong_submissions->fetch_assoc()) :
                                        ?>
                                        <tr>
                                            <td><?= $row['problem_id'] ?></td>
                                            <td><a href="#"><?= $row['name'] ?></a></td>
                                            <td><span class="badge badge-success"><?= $levels[$row['level']] ?></span></td>
                                            <td><?= $row['status'] ?></td>
                                        </tr>
                                    <?php
                                    endwhile;

                                endif;
                                ?>

                            </table>
                        </div>

                        <div id="solved-table">
                            <table class="table table-bordered table-striped">

                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                </tr>
                                <?php
                                $accepted_submissions = $conn->query($sql);
                                if (isset($accepted_submissions->num_rows) && $accepted_submissions->num_rows > 0) :
                                    // output data of each row
                                    while($row = $accepted_submissions->fetch_assoc()) :
                                        ?>
                                        <tr>
                                            <td><?= $row['problem_id'] ?></td>
                                            <td><a href="#"><?= $row['name'] ?></a></td>
                                            <td><span class="badge badge-success"><?= $levels[$row['level']] ?></span></td>
                                            <td><?= $row['status'] ?></td>
                                        </tr>
                                    <?php
                                    endwhile;

                                endif;
                                ?>

                            </table>
                        </div>

                        <div id="notsolved-table">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                </tr>

                                <?php
                                $wrong_submissions = $conn->query($sql2);
                                if (isset($wrong_submissions->num_rows) && $wrong_submissions->num_rows > 0) :
                                    // output data of each row
                                    while($row = $wrong_submissions->fetch_assoc()) :
                                        ?>
                                        <tr>
                                            <td><?= $row['problem_id'] ?></td>
                                            <td><a href="#"><?= $row['name'] ?></a></td>
                                            <td><span class="badge badge-success"><?= $levels[$row['level']] ?></span></td>
                                            <td><?= $row['status'] ?></td>
                                        </tr>
                                    <?php
                                    endwhile;
                                endif;
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!--<div id="myprofile-card" class="col-7">
                <div class="card details-card">
                    <div class="card-body">
                        profile
                    </div>
                </div>
            </div>

            <div id="tutorials-card" class="col-7">
                <div class="card details-card">
                    <div class="card-body">
                        tutorials
                    </div>
                </div>
            </div>-->
        </div>
    </div>

    <div id="footer">
        &copy 2018 CodeCourses.com | All Rights Reserved
    </div>
</div>



<!--Scripts for BS-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-
        q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="assets/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>

<!--Custom JS-->
<script src="script.js"></script>
</body>

</html>
