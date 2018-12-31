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

                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    </tr>
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
                                    if(isset($result->num_rows))
                                    while ($row = $result->fetch_assoc()):

                                    ?>

                                    <tr class="tr-shadow">

                                        <td><?= $row['contest_id'] ?></td>
                                        <td>
                                            <a href="../contest_problems/?id=<?= $row['contest_id'] ?>">
                                            <?= $row['name'] ?>
                                            </a>
                                        </td>
                                        <td> <?= $row['date'] ?></td>
                                        <td> <?= $row['length'] ?></td>
                                        <td>
                                            <?= $row['setter'] ?>
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                    <?php  endwhile; ?>

                                </tbody>
                            </table>
                        </div>



                </div>
            </div>

    </div>

    <?php require 'html_includes/scripts.html'; ?>

</body>

</html>
<!-- end document-->
