<?php

require '../back/database_connection.php';

// Create connection
$conn = get_sql_connection();

$sql = "SELECT * FROM submissions";

?>

<!doctype html>
<html>
    <head>
        <title>Standings</title>
        <link rel="stylesheet" href = "../assets/bootstrap-4.1.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href = "/codecourses/styles/style.css">
        <link rel="stylesheet" href="style.css">

        <link rel = "script"   href = "../assets/bootstrap-4.1.3-dist/js/bootstrap.min.js">
        <script src="../scripts/script.js"></script>
    </head>

    <body>
        <!--include navigation bar from a preset php file-->
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/codecourses/navbar_control.php";?>
        
        <div class="color">
            <div class ="tableWidth">
                <div class="table-responsive">

                    <table class ="table table-dark table-striped table-bordered" > 
                        <tr>
                            <th> # </th>
                            <th> Problem Name </th>
                            <th> User </th>
                            <th> Status </th>
                            <th> Langage </th>  
                        </tr>

                        <?php
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) :
                                while($row = $result->fetch_assoc()) :
                                    ProblemNameSql = "SELECT name form problems where problem_id = $row['problem_id']";
                                    userSql = "SELECT username form users where user_id = $row['user_id ']";
                                    statusSql = "SELECT name form problems where problem_id = $row['problem_id']";
                        ?>

                            <tr>
                                <td> $row['submission_id']</td>
                                <td> Sample </td>
                                <td> 10 </td>
                                <td class ="score"> +3 </td>
                                <td class ="wrong"> -4 </td> 
                                <td class ="score"> +3 </td> 
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
            </div>

            <div id="footer">
                &copy 2018 CodeCourses.com | All Rights Reserved
            </div> 
        </div>

</body>

</html>
