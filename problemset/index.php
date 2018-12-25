<?php


require '../back/database_connection.php';

// Create connection
$conn = get_sql_connection();

$sql = "SELECT * FROM problems";

$accepted_img_dir = "../assets/images/ok.png";
$wrong_answer_img_dir = "../assets/images/wrong.png";

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
<<<<<<< HEAD
                <table class ="table table-striped table-bordered table-dark" > 
=======
                <table class ="table table-dark  table-striped  table-bordered" > 
>>>>>>> f37329722f1d1ac1567d692ff4c89ce0373d095f
                    <tr>
                        <th class= "topLeftRad"> Name </th>
                        <th>Level</th>
                        <th> <img src="/codecourses/assets/images/user.png"> </th> 
                        <th class = "topRightRad"> Status </th>
                    </tr>
<<<<<<< HEAD
                    <tr>
                        <td class= "topLeftRad"> <a href ="#" > Sample </a> </td>
                        <td> <span class="badge badge-success">Intermediate<span> </td>
                        <td> 10 </td> 
                        <td class = "topRightRad"><span class="badge badge-danger">Wrong Answer</span></td>
                    </tr>
                    <tr>
                        <td class= "topLeftRad"> <a href ="#" > Sample </a> </td>
                        <td> <span class="badge badge-success">Beginner<span> </td>
                        <td> 10 </td> 
                        <td class = "topRightRad"><span class="badge badge-success">Accepted</span></td>
                    </tr>
=======
>>>>>>> f37329722f1d1ac1567d692ff4c89ce0373d095f
                    
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
                                <td>
										<img src=
										<?php
										if (is_solved_for_user($row['problem_id'], $_SESSION['user_id'], $conn)) {
											# code...
											echo "$accepted_img_dir";
										}else{
											echo "$wrong_answer_img_dir";
										}
										?>
										style="width:16px;height:16px;"> 
									</td>
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
