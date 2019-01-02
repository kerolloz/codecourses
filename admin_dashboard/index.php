<?php
require '../back/database_connection.php';
$connection = get_sql_connection();
$select_contests_sql_stmnt_string = "SELECT * FROM contests";
?>
<!DOCTYPE html>
<html lang="en">

<?php require 'html_includes/head.html'; ?>

<body class="animsition">

    <div class="page-wrapper">

        <?php require 'html_includes/menu_sidebar.html' ; ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <?php require 'html_includes/header_desktop.html'; ?>


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <h3 class="title-5">contests table</h3>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a href="contest.php">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add contest</button> </a>
                                    </div>
                                </div>
                                <div class="table-responsive table--no-card">
                                    <table class="table table-borderless table-striped table-earning table-data2 table-data3 black-table">
                                        <thead>
                                            <tr>
                                                <th>Contest ID</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Duration</th>
                                                <th>Setter</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                                $result = $connection->query($select_contests_sql_stmnt_string);
                                                                if (isset($result->num_rows) && $result->num_rows) {
                                                                    while ($row = $result->fetch_assoc()):

                                                                ?>
                                            <tr class="tr-shadow <?= $row['contest_id'] ?>">

                                                <td>
                                                    <?= $row['contest_id'] ?>
                                                </td>
                                                <td>
                                                    <a href="../contest_problems/?id=<?= $row['contest_id'] ?>">
                                                        <?= $row['name'] ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?= $row['date'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['length'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['setter'] ?>
                                                </td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button id="<?= $row['contest_id'] ?>" class="item delete-class" data-toggle="tooltip" type="button" data-placement="top" title="" data-original-title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>


                                            <?php  endwhile;
                                                                } else {
                                                                    echo "<tr class='tr-shadow'>
                                                            <td colspan='6'>
                                                            NO AVAILABLE CONTESTS
                                                            </td>
                                                            </tr>";
                                                                } ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
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
