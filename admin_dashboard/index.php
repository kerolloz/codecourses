<?php
require '../back/database_connection.php';
if(!is_admin()){
    header("location: ../error/404.html");
}
// if not logged in as admin show access forbiden
$connection = get_sql_connection();
$select_contests_sql_stmnt_string = "SELECT * FROM contests";
$select_problems_sql_stmnt_string = "SELECT * FROM problems";
?>
<!DOCTYPE html>
<html lang="en">
<?php require 'html_includes/head.html'; ?>

<body class="animsition">
    <div class="page-wrapper">
        <?php require 'html_includes/menu_sidebar.html' ; ?>
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <?php require 'html_includes/header_desktop.php'; ?>
            <!-- MAIN CONTENT-->
            <div class="section__content section__content--p50">
                <div class="container-fluid">

                    <div class="main-content">
                        <div class="card">
                            <div class="custom-tab">
                                <nav>
                                    <div class="nav nav-justifid nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-selected nav-link active show" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-problems" role="tab" aria-controls="custom-nav-home" aria-selected="false">Problems</a>
                                        <a class="nav-item nav-selected nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contests" role="tab" aria-controls="custom-nav-contact" aria-selected="true">Contests</a>
                                    </div>
                                </nav>

                                <div class="card-body">

                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">

                                        <div class="tab-pane fade active show" id="custom-nav-problems" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                            <?php require 'html_includes/problems-table.php'; ?>
                                        </div>

                                        <div class="tab-pane fade" id="custom-nav-contests" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                            <?php require 'html_includes/contests-table.php'; ?>
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
    <?php require 'html_includes/scripts.html'; ?>
</body>

</html>
