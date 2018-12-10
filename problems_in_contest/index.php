<!doctype html>
<html>
    <head>
        <title>ProblemsInContest</title>
        <link rel="stylesheet" href = "bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/codecourses/styles/style.css">
        <link rel = "script"   href = "bootstrap/js/bootstrap.min.js">
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

            <tr>
             	 <td> A </a> </td>
             	 <td> <a href = " file:///home/yousef/Desktop/OJ_Tutorials-master/app/frontEnd/ProblemPage/index.html" target="_blank">  Sample </a> </td>
               	 <td>  x10 </td> 
            	 <td>  yes 	 </td>
            </tr>

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