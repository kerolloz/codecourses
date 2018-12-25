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

$sql = "SELECT * FROM problems";

?>
<!doctype html>
<html>
    <head>
        <title>ProblemSet</title>
        
        <link rel="stylesheet" href = "../assets/bootstrap-4.1.3-dist/css/bootstrap.min.css">
        <link rel = "script"   href = "../assets/bootstrap-4.1.3-dist/js/bootstrap.min.js">
        <link rel="stylesheet" href="../styles/style.css">
        <link rel="stylesheet" href="style.css">

        <script src="../scripts/script.js"></script>
        
    </head>
    <body>
        
        <!--include navigation bar from a preset php file-->
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/codecourses/navbar_control.php";?>
        
        

        <!-- ProblemSection -->
        <div class="color">
            <div class="table-responsive">
                <table class ="table table-dark  table-striped  table-bordered" > 
                    <tr>
                        <th class= "topLeftRad"> Name </th>
                        <th> <span class="badge badge-success"> Level </span> </th>
                        <th> <img src="/codecourses/assets/images/user.png"> </th> 
                        <th class = "topRightRad"> Status </th>
                    </tr>
                    <tr>
                        <td class= "topLeftRad"> <a href ="#" > Sample </a> </td>
                        <td> Intermediate </td>
                        <td> 10 </td> 
                        <td class = "topRightRad"> <img src="/codecourses/assets/images/ok.png"> </td>
                    </tr>
                <tr>
                        <td class= "topLeftRad"> <a href ="#" > Sample </a> </td>
                        <td> Intermediate </td>
                        <td> 10 </td> 
                        <td class = "topRightRad"> <img src="/codecourses/assets/images/wrong.png"  width="16" height="16"> </td>
                    </tr>
                    
                    <?php 
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) :
                        // output data of each row
                        while($row = $result->fetch_assoc()) :
                    ?>
                            <tr>
                                <td ><a href="/codecourses/problem?id=<?= $row['problem_id'] ?>"> <?= $row['name'] ?> </td>
                                <?php
                                switch ($row['level']) {
                                    case 1:
                                        echo "<td>Beginner </td>";
                                        # code...
                                        break;
                                    case 2:
                                         echo "<td>Intermediate </td>";
                                         break;
                                    case 3:
                                        echo "<td>Advanced </td>";
                                    default:
                                        # code...
                                        break;
                                }
                                ?>
                                <td> <?= $row['number_of_solvers'] ?>  </td> 
                                <td> no  </td>
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

            <div id="footer">
                &copy 2018 CodeCourses.com | All Rights Reserved
            </div>   
        </div>     

</body>  

</html>
