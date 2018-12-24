<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ojDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
                            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true):
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

                            <div onclick="myprofile()">
                                <img src="../assets/images/person.png" width="15px" height="15px">
                                <label>My Profile</label>
                            </div>

                            <div onclick="tutorials()">
                                <img src="../assets/images/book.jpg" width="17px" height="17px">
                                <label>Tutorials</label>
                            </div>

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
                            <?php $sql = "SELECT submissions.problem_id,status,level,name  FROM submissions,problems WHERE submissions.problem_id = problems.problem_id AND user_id = 4 AND status = 'accepted'";
                            $result1 = $conn->query($sql);
                            $sql = "SELECT submissions.problem_id,status,level,name  FROM submissions,problems WHERE submissions.problem_id = problems.problem_id AND user_id = 4 AND NOT  status = 'accepted'";
                            $result2 = $conn->query($sql);
                            ?>
                            <div class="col-4 tried-col" onclick="sub_tried()">
                                <h4>Tried</h4>
                                <span> <?= $result2->num_rows + $result1->num_rows?> </span>
                            </div>
                            <div id="solved-col" class="col-4 solved-col" onclick="sub_solved()">
                                <h4>Solved</h4>
                                <span><?= $result1->num_rows?></span>
                            </div>
                            <div id="notsolved-col" class="col-4 notsolved-col" onclick="sub_notsolved()">
                                <h4>Not solved</h4>
                                <span><?= $result2->num_rows?></span>
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
                                if ($result1->num_rows > 0) :
                                    // output data of each row
                                    while($row = $result1->fetch_assoc()) :
                                        ?>
                                        <tr>
                                            <td><?= $row['problem_id'] ?></td>
                                            <td><a href="#"><?= $row['name'] ?></a></td>
                                            <td><span class="badge badge-success"><?= $row['level'] ?></span></td>
                                            <td><?= $row['status'] ?></td>
                                        </tr>
                                    <?php
                                    endwhile;

                                else:
                                    echo "0 results";
                                endif;
                                ?>
                                <?php
                                if ($result2->num_rows > 0) :
                                    // output data of each row
                                    while($row = $result2->fetch_assoc()) :
                                        ?>
                                        <tr>
                                            <td><?= $row['problem_id'] ?></td>
                                            <td><a href="#"><?= $row['name'] ?></a></td>
                                            <td><span class="badge badge-success"><?= $row['level'] ?></span></td>
                                            <td><?= $row['status'] ?></td>
                                        </tr>
                                    <?php
                                    endwhile;

                                else:
                                    echo "0 results";
                                endif;
                                $conn->close();
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

                                <tr>
                                    <td>45561</td>
                                    <td><a href="#">Codecourses</a></td>
                                    <td><span class="badge badge-success">beginner</span></td>
                                    <td>Accepted</td>
                                </tr>

                                <tr>
                                    <td>13546</td>
                                    <td><a href="#">Even-Odd</a></td>
                                    <td><span class="badge badge-success">intermediate</span></td>
                                    <td>Accepted</td>
                                </tr>

                                <tr>
                                    <td>1548</td>
                                    <td><a href="#">Graph</a></td>
                                    <td><span class="badge badge-success">advenced</span></td>
                                    <td>Accepted</td>
                                </tr>
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

                                <tr>
                                    <td>45561</td>
                                    <td><a href="#">Codecourses</a></td>
                                    <td><span class="badge badge-success">beginner</span></td>
                                    <td>Memory Limit Exced</td>
                                </tr>

                                <tr>
                                    <td>13546</td>
                                    <td><a href="#">Even-Odd</a></td>
                                    <td><span class="badge badge-success">intermediate</span></td>
                                    <td>Time Limit Exced</td>
                                </tr>

                                <tr>
                                    <td>1548</td>
                                    <td><a href="#">Graph</a></td>
                                    <td><span class="badge badge-success">advenced</span></td>
                                    <td>Wrong Answer</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div id="myprofile-card" class="col-7">
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
            </div>
        </div>
    </div>
</div>


<div id="footer">
    &copy 2018 CodeCourses.com | All Rights Reserved
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