<!--Navbar Section-->
<nav>
    <img src="assets/images/codeCourses.png" 
         class = "nav-left"
         id = "imgMobile">
    <ul id = "dropdownClick" class = "nav-left">
        <li><a href="/codecourses">Home</a></li>
        <li><a href=<?= "/codecourses/problemset/" ?>>Problem Set</a></li>
        <li><a href="/codecourses/roadmap/">Road Map</a></li>
        <li><a href="/codecourses/contests/">Contests</a></li>
        <?php 
          
        if(!isset($_SESSION))
            session_start();
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true):
        ?>
        <li class="nav-right"><a href="/codecourses/back/logout.php" >logout</a></li>
        <?php 
        else:
        ?>
        <li class="nav-right"><a href="/codecourses/signin/">Sign In</a></li>
        <li class="nav-right"><a href="/codecourses/signup/">Sign Up</a></li>
        <?php
        endif;
        ?>
        <li class="dropdownIcon"><a href="javascript:void(0);" onclick="dropdownMenu()">&#9776;</a></li>
    </ul>
</nav>