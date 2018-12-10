<!--Navbar Section-->
<nav>
    <img src="/codecourses/assets/images/codeCourses.png" 
         class = "nav-left"
         id = "imgMobile">
    <ul id = "dropdownClick" class = "nav-left">
        <li><a href="/codecourses">Home</a></li>
        <li><a href="/codecourses/problemset/">Problem Set</a></li>
        <li><a href="/codecourses/roadmap/">Road Map</a></li>
        <li><a href="/codecourses/contests/">Contests</a></li>
        <li><a href="/codecourses/tutorials/">Tutorials</a></li>
        <?php 
          
        if(!isset($_SESSION))
            session_start();
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true):
        ?>
        <li class="nav-right"><a href="/codecourses/back/logout.php" >Logout</a></li>
        <?php 
        else:
        ?>
        <li class="nav-right"><a href="/codecourses/authentication/">Authentication</a></li>
        <?php
        endif;
        ?>
        <li class="dropdownIcon"><a href="javascript:void(0);" onclick="dropdownMenu()">&#9776;</a></li>
    </ul>
</nav>