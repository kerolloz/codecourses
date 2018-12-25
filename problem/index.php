<?php
$errors_array = [];
if(isset($_POST['submit'])){
  if(!isset($_SESSION))
      session_start();
  if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true):
    require '../judge_tester/process_submission.php';
  else:
      header("location: ../authentication/");
  endif;
}
?>

<!doctype html>
<html>
    <head>
        <title>Problem</title>

        <link rel="stylesheet" href = "../assets/bootstrap-4.1.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../styles/style.css">
        <link rel="stylesheet" href="style.css">

    </head>
    <body>

        <!--include navigation bar from a preset php file-->
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/codecourses/navbar_control.php";?>

        <div class="color">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <!--Problem pdf -->
                        <?php
                        $problem_id = filter_var($_GET['id'], FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
                        if(!$problem_id)
                            header("location: /codecourses/errors/404.html");
                        ?>
                        <embed class="pdfContainer" src="/codecourses/problems_db/<?= $problem_id ?>/problem.pdf"> <!--src=#problem pdf-->
                        <br><br><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="showsubmit">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            SUBMIT
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="demo model" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLongTitle">Submit solution</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="lang"><h5>Language:</h5></div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="user-select">
                                                        <select name="compiler">
                                                            C++ 
                                                            <option value="1">GNU G++17 7.3.0</option>
                                                        </select>
                                                    </div>
                                                    <br><br><br>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-4">
                                                    <!--Source Code Section -->
                                                    <div class="sors"><h5>Source Code:</h5></div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="sendSubmit">
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <textarea name="code" rows="20"><?php if($errors_array){ echo htmlentities($code);}?></textarea>
                                                            <br>
                                                            <br>
                                                            <input type="hidden" name="problem_id" value="<?= $_GET['id'] ?>">
                                                            <input type="file" name="my_file">
                                                            <br>
                                                            <br>
                                                            <div class="modal-footer">
                                                                <button id="resbtn" type="submit" class="btn btn-primary" name="submit">
                                                                    SUBMIT
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--3 Models ACC, WA, TLE -->
                <!-- 1 -->

                <div id="res" class="finalResultClass">
                    <!-- Modal content -->
                    <div class="resultMod">
                        <span class="closeRes">&times;</span>
                        <h3 id="judgeResult">Please Wait!</h3>
                    </div>
                </div>
            </div>

            <div id="footer">
                &copy 2018 CodeCourses.com | All Rights Reserved
            </div>
        </div>

      <?php
if (isset($return_value)):

switch ($return_value) {
    case 0:
    echo '<script>
    	var jr = document.getElementById("judgeResult");
    	jr.innerHTML = "Accepted";
    </script>';
        break;
    case 1:
    echo '<script>
    	var jr = document.getElementById("judgeResult");
    	jr.innerHTML = "WrongAnswer";
    </script>';
        break;
    case -1:
    echo '<script>
    	var jr = document.getElementById("judgeResult");
    	jr.innerHTML = "Compilation Error";
    </script>';
        break;
    case 124:
    echo '<script>
    	var jr = document.getElementById("judgeResult");
    	jr.innerHTML = "Time Limit Exceed";
    </script>';
        break;
    default:
    echo '<script>
    	var jr = document.getElementById("judgeResult");
    	jr.innerHTML = "Cannot run docker container, Something went wrong";
    </script>';
        break;
}
else:
	echo '<script>
		document.getElementById("res").className = "result";
	</script>';
endif;

$return_value = null;
?>
        </div>

        <script src="../assets/bootstrap-4.1.3-dist/js/jQuery.js"></script>
        <script src="../assets/bootstrap-4.1.3-dist/js/bootstrap.js"></script>
        <script src="../scripts/script.js"></script>
        <script src="script.js"></script>

    </body>
</html>
