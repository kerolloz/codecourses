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

$sql = "SELECT * FROM problems WHERE contest_id=" . $_GET['id'];

?>
<!doctype html>
<html>
    <head>
        <title>ProblemsInContest</title>
        <link rel="stylesheet" href = "/codecourses/assets/bootstrap-4.1.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">

        <link rel = "script"   href = "/codecourses/assets/bootstrap-4.1.3-dist/js/bootstrap.min.js">
        <script src="script.js"></script>
        <script src="/codecourses/scripts/script.js"></script>
    </head>
    <body>
        
        <!--include navigation bar from a preset php file-->
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/codecourses/navbar_control.php";?>

        <br> <br> <br> <br>

        <!-- Problems In Contest Section -->
<div class = "tableWidth">
      	
       <div class="table-responsive">

    	  <table class ="table   table-striped  table-bordered" > 
   	         
            <tr>
            	<th> # </th>
               	<th> Name </th>
               	<th> <img src="/codecourses/assets/images/user.png"> </th>
               	<th> <img src="/codecourses/assets/images/ok.png" > </th> 
           	</tr>
           	<?php 
			$result = $conn->query($sql);

			if ($result->num_rows > 0) :
			    // output data of each row
			    $problem_character = "A";
			    while($row = $result->fetch_assoc()) :
			?>
			    	<tr>
			    		<td> <?= $problem_character++ ?> </td>
		                <td> <a  href="/codecourses/problem?id=<?= $row['problem_id'] ?>"> <?= $row['name'] ?> </a> </td>
		                <td> <?= $row['number_of_solvers'] ?>  </td>
		                <td> no  </td>
		            </tr>
			<?php
				endwhile;

			else: 
			    echo "<pre><br>NO PROBLEMS IN THIS CONTEST</pre>";
			endif;
			$conn->close();
            ?>


    	</table>

	  </div>

	<div class = "countDownTable">

	    <table class ="table table-bordered table-striped">

    		<tr>
    			<th> <span class="badge badge-danger"> CountDown !</span> </th> 
    		</tr>

    		<tr>
    			<td> <p id="countDown"> </p> </td>
    		</tr>

    	</table>
	</div>

</div>

<div id="footer">
            &copy 2018 CodeCourses.com | All Rights Reserved
        </div>        

</body>  

</html>