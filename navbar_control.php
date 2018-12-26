<!--Navbar Section-->
<nav>
    <a href="../home/index.php"><img src="../assets/images/codeCourses.png"
         class = "nav-left"
         id = "imgMobile"></a>
    <ul id = "dropdownClick" class = "nav-left">
        <li><a href="../home">Home</a></li>
        <li><a href="../problemset/">Problem Set</a></li>
        <li><a href="../contests/">Contests</a></li>
        <li><a href="./roadmap/">Road Map</a></li>
        <?php
        if(!isset($_SESSION))
            session_start();
        if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true):
        ?>
        <li><a href="../submissions/">Submissions</a></li>
        <li class="nav-right"><a href="../back/logout.php" >Logout</a></li>
        <li class="nav-right"><a href="../profile"><?=  $_SESSION['fname']?>,</a></li>
        <?php
        else:
        ?>
        <li class="nav-right"><a href="../authentication/">Sign in</a></li>
        <?php
        endif;
        ?>
        <?php
            if(isset($_SESSION['standing']) && $_SESSION['standing'] ==true):

        ?>
         <li class="nav-left"><a href="../standings/">Standing</a></li>
         <?
            $_SESSION['standing'] = false;
            endif;
        ?>
        <li class="dropdownIcon"><a href="javascript:void(0);" onclick="dropdownMenu()">&#9776;</a></li>
    </ul>
</nav>
