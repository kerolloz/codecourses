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
        
        <br> <br> <br>
        <!--include navigation bar from a preset php file-->
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/codecourses/navbar_control.php";?>
        
      	<div class ="tableWidth">
       <div class="table-responsive">

    	  <table class ="table   table-striped  table-bordered" > 
              <caption> Standings </caption>
            <tr>
            	<th> # </th>
            	<th> Participant </th>
            	<th> = </th>
               	<th class="underline"> A </th>
               	<th class ="underline"> B </th> 
               	<th class ="underline"> C </th> 
           	</tr>
          <tr>
              <td> 1 </td>
              <td> Sample </td>
              <td> 10 </td>
                <td class ="score"> +3 </td>
                <td class ="score"> +4 </td> 
                <td class ="score"> +3 </td> 
            </tr>


           </table>
       </div>
      </div>

</body>

</html>
