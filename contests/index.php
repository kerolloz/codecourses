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

$sql = "SELECT * FROM contests";

?>
<!doctype html>
<html>
    <head>
        <title>Contests</title>

        <link rel="stylesheet" href = "/codecourses/assets/bootstrap-4.1.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="../styles/style.css">

        <link rel = "script"   href = "/codecourses/assets/bootstrap-4.1.3-dist/js/bootstrap.min.js">
        <script src="/codecourses/scripts/script.js"></script>
       
    </head>
    <body>
       
        <!--include navigation bar from a preset php file-->
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/codecourses/navbar_control.php";?>

        <!-- Contests Section -->
        <div class="color">
            <div class="table-responsive">
                <table class ="table   table-striped  table-bordered" > 
                    <caption> <span> Current Or Upcoming Contests </span> </caption>
                    
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
                                <td> <a  href="/codecourses/contest_problems?id=<?= $row['contest_id'] ?>"> <?= $row['name'] ?> </a> </td>
                                <td> <?= $row['setter'] ?> </td>
                                <td> <?= $row['date'] ?> </td> 
                                <td> <?= $row['length'] ?>m </td>
                                <td> <button id="register"> <span class="badge badge-primary"> &gt Register</span> </button> </td>
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
        </div>

        <div id="footer">
            &copy 2018 CodeCourses.com | All Rights Reserved
        </div>        

    </body>  

</html>