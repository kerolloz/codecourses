<?php
require '../back/database_connection.php';
// Create connection
$conn = get_sql_connection();

$sql = "SELECT * FROM contests";

?>
<!doctype html>
<html>
    <head>
        <title>Contests</title>

        <link rel="stylesheet" href = "../assets/bootstrap-4.1.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="../styles/style.css">


    </head>
    <body>

        <!--include navigation bar from a preset php file-->
        <?php require "../navbar_control.php";?>

        <!-- Contests Section -->
        <div class="color">
            <div class="table-responsive">
                <table class ="table table-dark  table-striped  table-bordered" >

                    <tr>
                        <th> Name </th>
                        <th> Writers  </th>
                        <th> Start </th>
                        <th> Length </th>
                        <th>Registeration</th>
                    </tr>
                    <?php
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) :
                            // output data of each row
                            while($row = $result->fetch_assoc()) :
                    ?>
                            <tr>
                                <td> <a  href="../contest_problems?id=<?= $row['contest_id'] ?>"> <?= $row['name'] ?> </a> </td>
                                <td> <?= $row['setter'] ?> </td>
                                <td> <?= $row['date'] ?> </td>
                                <td> <?= $row['length'] ?>m </td>
                                <td> <a class="btn-secondary" href="register.php?contest_id=<?= $row['contest_id'] ?>"><button id="register" type="button" class="btn btn-secondary"> Register</button></a> </td>

                            </tr>
                    <?php
                            endwhile;

                        else:
                            echo "0 results";
                        endif;
                        $conn->close();
                    ?>
                    <tr>

                    </tr>

                </table>
            </div>


            <div id="footer">
                &copy 2018 CodeCourses.com | All Rights Reserved
            </div>
        </div>

        <script src="../assets/bootstrap-4.1.3-dist/js/jQuery.js"></script>
        <script src="../assets/bootstrap-4.1.3-dist/js/bootstrap.js"></script>
        <script src="../scripts/script.js"></script>
        <script src="script.js"></script>

    </body>

</html>
