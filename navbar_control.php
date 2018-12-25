<!--Navbar Section-->
<nav>
    <a href="/codecourses/home/index.php"><img src="/codecourses/assets/images/codeCourses.png" 
         class = "nav-left"
         id = "imgMobile"></a>
    <ul id = "dropdownClick" class = "nav-left">
        <li><a href="/codecourses">Home</a></li>
        <li><a href="/codecourses/problemset/">Problem Set</a></li>
        <li><a href="/codecourses/contests/">Contests</a></li>
        <li><a href="/codecourses/roadmap/">Road Map</a></li>
        <?php 
        if(!isset($_SESSION))
            session_start();
        if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true):
        ?>

        <li class="nav-right"><a href="/codecourses/back/logout.php" >Logout</a></li>
        <li class="nav-right"><a href="/codecourses/profile"><?=  $_SESSION['fname']?>,</a></li>
        <?php 
        else:
        ?>
        <li class="nav-right"><a href="/codecourses/authentication/">Sign in</a></li>
        <?php
        endif;
        ?>
        <?php
            if(isset($_SESSION['standing']) && $_SESSION['standing'] ==true):

        ?>
         <li class="nav-left"><a href="/codecourses/standings/">Standing</a></li>
         <?
            $_SESSION['standing'] = false;
            endif;
        ?>
        <li class="dropdownIcon"><a href="javascript:void(0);" onclick="dropdownMenu()">&#9776;</a></li>
    </ul>
</nav>

