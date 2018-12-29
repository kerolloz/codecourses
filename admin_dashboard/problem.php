<?php

require '../back/database_connection.php';
$sql_connection = get_sql_connection();

$Error = null;
if (isset($_POST['submit'])) {
    require '../back/problem_creation.php';
}
if (isset($_POST['download_pdf'])) {
    # code...
    require '../back/download_pdf.php';
}
if (isset($_POST['download_test_cases'])) {
    require '../back/download_test_cases.php';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Problem Creation</title>


    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">


</head>

<body class="animsition">

    <div class="page-wrapper">

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="../home">
                    <img src="../assets/images/codeCourses_opt.png" alt="CodeCourses" width="65%" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">


                        <li class="active">
                            <a href="contest.php">
                                <i class="far fa-check-square"></i>Contest</a>
                        </li>
                        <li class="active">
                            <a href="problem.php">
                                <i class="far fa-check-square"></i>Problems</a>
                        </li>



                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">

                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix">

                                        <div>
                                            Admin
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->

            <div class="main-content">

                <!-- modal PDF Downloader -->
                <div class="modal fade" id="cfPDFDownloader" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Problem PDF</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="noRefreshForm" method="post">

                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Problem Link:</label>
                                        <input type="url" name="pdf_problem_link" class="form-control" id="pdf_problem_link" required>
                                    </div>
                                    <div class="progress mb-2" id="cfPDFDownloaderProgressBarr" style="visibility: hidden;">
                                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">Please Wait While Downloading Your
                                            PDF</div>
                                    </div>


                                    <div id="pdf_result">
                                        <!-- All data will display here  -->
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('cfPDFDownloaderProgressBarr').style.visibility = 'hidden';">Close</button>
                                    <button class="submit btn btn-primary" type="button" value="Submit" name="download_pdf" onclick="SubmitDownloadPDF();">Download PDF</button>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- end modal PDF Downloader -->

                <!-- modal CF-PARSER -->
                <div class="modal fade" id="cfSubmissionParserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New TestCases</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="">
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Submission Link:</label>
                                        <input type="url" name="submission_link" class="form-control" id="submission_link" required>
                                    </div>
                                    <div class="progress mb-2" id="cfSubmissionParserProgressBarr" style="visibility: hidden;">
                                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">Please Wait While Downloading Your
                                            TestCases</div>
                                    </div>
                                    <div id="testcases_result">
                                        <!-- All data will display here  -->
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('cfSubmissionParserProgressBarr').style.visibility = 'hidden';">Close</button>
                                    <button type="button" name="download_test_cases" class="btn btn-primary" onclick="SubmitParseTestCases();">Parse Test Cases</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- end modal CF-PARSER -->


                <!-- modal TESTCASE -->
                <div class="modal fade" id="testcaseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New TestCase</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Input:</label>
                                        <textarea class="form-control" id="message-text"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Output:</label>
                                        <textarea class="form-control" id="message-text"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Add Test Case</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal TESTCASE -->
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">


                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Problem </strong> Form
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Problem Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="problem_name" placeholder="Problem Name" class="form-control" required autofocus>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Problem Level</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="problem_level" id="select" class="form-control" required>
                                                        <option value="1">Beginner</option>
                                                        <option value="2">Intermediate</option>
                                                        <option value="3">Advanced</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Contest</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="contest_id" id="select" class="form-control" required>
                                                        <?php
                                                        $result = $sql_connection->query("SELECT contest_id, name FROM contests");
                                                        if ($result->num_rows > 0):
                                                            while($row = $result->fetch_assoc()):
                                                        ?>
                                                        <option value="<?= $row['contest_id']?>">
                                                            <?= $row['contest_id']?> &dash;
                                                            <?= $row['name']?>
                                                        </option>
                                                        <?php
                                                            endwhile;
                                                            close_sql_connection($sql_connection);
                                                        else:
                                                        ?>

                                                        <option value="-1" disabled>NO AVAILABLE CONTESTS</option>
                                                        <?php
                                                        endif;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Time Limit</label>
                                                </div>
                                                <div class="col-12 col-md-9 input-group">
                                                    <input type="number" id="text-input" name="time_limit" class="form-control" placeholder="Time Limit" value="1" min="1" max="30" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Second(s)</span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Memory Limit</label>
                                                </div>
                                                <div class="col-12 col-md-9 input-group">
                                                    <input type="number" id="text-input" name="memory_limit" class="form-control" placeholder="Memory Limit" value="5" min="5" max="500" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">MegaByte(s)</span>
                                                    </div>

                                                </div>


                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Problem PDF</label>
                                                </div>
                                                <!-- Button trigger modal -->
                                                <div class="col-12 col-md-9 input-group">

                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#cfPDFDownloader" data-whatever="@mdo">
                                                        CF PDF Downloader&nbsp;
                                                        <i class="fa fa-file-pdf-o" style="color:white"></i>

                                                    </button>

                                                    <div>
                                                    </div>
                                                    &nbsp;<strong class="md-1">Or</strong>&nbsp;
                                                    <input type="file" accept=".pdf" class="btn btn-danger">
                                                    <?php
                                                    if (isset($download_pdf_error)):
                                                        echo $download_pdf_error;
                                                    elseif (isset($download_pdf_success)):
                                                    ?>
                                                    &nbsp; <i class="fa fa-check-square" style="color:green"></i>
                                                    <?php
                                                    endif;
                                                    ?>
                                                </div>

                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Test Cases</label>
                                                </div>
                                                <!-- Button trigger modal -->
                                                <div class="col-12 col-md-9 input-group">

                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cfSubmissionParserModal" data-whatever="@mdo">
                                                        CF TestCases Submission Parser&nbsp;
                                                        <i class="fa fa-lightbulb-o"></i>

                                                    </button>

                                                    <div>
                                                    </div>
                                                    &nbsp;<strong class="md-1">Or</strong>&nbsp;
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#testcaseModal" data-whatever="@mdo">
                                                        Add TestCases Manually&nbsp;
                                                        <i class="fa fa-terminal" style="color:white"></i>

                                                    </button>
                                                    <?php
                                                    if (isset($download_test_cases_submission_folder_name)):
                                                        echo '&nbsp; <i class="fa fa-check-square" style="color:green"></i>';
                                                        echo $download_test_cases_submission_folder_name;
                                                    ?>
                                                    <input type="text" name="download_test_cases_submission_folder_name" value="<?= $download_test_cases_submission_folder_name ?>" hidden>
                                                    <?php
                                                    elseif (isset($download_test_cases_error)):
                                                        echo $download_test_cases_error;
                                                    endif;
                                                    ?>
                                                </div>

                                            </div>



                                            <div class="card-footer">
                                                <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Create
                                                </button>
                                            </div>

                                        </form>
                                    </div>

                                </div>
                                <?php
                                if(!isset($Error) && isset($_POST['submit'])):
                                ?>
                                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                    <span class="badge badge-pill badge-success">Success</span>
                                    You successfully created this Problem.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <?php
                                elseif (isset($Error)):
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <?=  $Error ?>
                                    Please make sure MySQL Database is working properly.

                                </div>
                                <?php
                                endif;
                                ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Jquery JS-->
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="vendor/slick/slick.min.js">
        </script>
        <script src="vendor/wow/wow.min.js"></script>
        <script src="vendor/animsition/animsition.min.js"></script>
        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="vendor/circle-progress/circle-progress.min.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="vendor/select2/select2.min.js">
        </script>

        <!-- Main JS-->
        <script src="js/main.js"></script>
        <script src="js/no_refresh_submit.js"></script>

</body>

</html>
<!-- end document-->
