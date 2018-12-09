<!doctype html>
<html>
    <head>
        <title>Contests</title>
        <link rel="stylesheet" href = "bootstrap/css/bootstrap.min.css">
        <link rel = "script"   href = "bootstrap/js/bootstrap.min.js">
        <link rel="stylesheet" href="/codecourses/styles/style.css">
        <script src="/codecourses/scripts/script.js"></script>
    </head>
    <body>
       
        <!--include navigation bar from a preset php file-->
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/codecourses/navbar_control.php";?>
        

        <br> <br> <br> <br>

        <!-- Contests Section -->

        <div class="table-responsive">
        <table class ="table   table-striped  table-bordered" > 
        	<caption> <span> Current Or Upcoming Contests </span> </caption>
            
            <tr>
                <th> Name </th>
                <th> Writers  </th>
                <th> Start </th> 
                <th> Length </th>
                <th></th>
            </tr>
            <tr>
                <td> <a  href="ACM_SCU_Special_Training_Contest/"> ACM-SCU Special Training Contest </a> </td>
                <td> Amr Salama  </td>
                <td>  06/12/2018  @  1:00 PM </td> 
                <td>  3:00  </td>
                <td> <button id="register"> <span class="badge badge-primary"> &gt Register</span> </button> </td>
            </tr>
        
    </table>
</div>


<div id="footer">
            &copy 2018 CodeCourses.com | All Rights Reserved
        </div>        

</body>  

</html>