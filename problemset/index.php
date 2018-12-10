<!doctype html>
<html>
    <head>
        <title>ProblemSet</title>
        
        <link rel="stylesheet" href = "/codecourses/assets/bootstrap-4.1.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel = "script"   href = "/codecourses/assets/bootstrap-4.1.3-dist/js/bootstrap.min.js">
        <script src="script.js"></script>
        
    </head>
    <body>
        
        <!--include navigation bar from a preset php file-->
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/codecourses/navbar_control.php";?>
        
        <br> <br> <br> <br>

        <!-- ProblemSection -->
        <div class="table-responsive">
        <table class ="table   table-striped  table-bordered" > 
            <tr>
                <th class= "topLeftRad"> Name </th>
                <th> <span class="badge badge-success"> Level </span> </th>
                <th> <img src="/codecourses/assets/images/user.png"> </th> 
                <th class = "topRightRad"> <img src ="/codecourses/assets/images/ok.png"> </th>
            </tr>
            <tr>
                <td ><a href="" target="_blank"> Sample </td>
                <td> 3  </td>
                <td>  1800  </td> 
                <td>  yes </td>
            </tr>
            <tr>
                <td> <a href="" target="_blank"> Sample </td>
                <td> 2  </td>
                <td>  1750  </td> 
                <td>  No </td>
            </tr>  
           
    </table>
</div>

<div id="footer">
            &copy 2018 CodeCourses.com | All Rights Reserved
        </div>        

</body>  

</html>