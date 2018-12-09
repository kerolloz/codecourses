<!doctype html>
<html>
    <head>
        <title>Problem</title>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
    </head>
    <body>
        <!--Navbar Section-->
        <nav>
            <img src="assets/images/codeCourses.png" 
                 class = "nav-left"
                 id = "imgMobile">
            <ul id = "dropdownClick" class = "nav-left">
                <li><a href="#home">Home</a></li>
                <li><a href="#problemset">Problem Set</a></li>
                <li><a href="#roadmap">Road Map</a></li>
                <li><a href="#contests">Contests</a></li>
                <li class="nav-right"><a href="#signin">Sign In</a></li>
                <li class="nav-right"><a href="#signup">Sign Up</a></li>
                <li class="dropdownIcon"><a href="javascript:void(0);" onclick="dropdownMenu()">&#9776;</a></li>
            </ul>
        </nav>
        <br>
      
        <!--Problem Section-->
        <!--Problem pdf -->
        <embed class="pdfContainer" src="assets/p10110.pdf"> <!-- src = #problem pdf-->
        <br><br><br>
      
        <!--Select Language Section-->
        <div class="row-1">
            <h4>Language:</h4>
        </div>
    
        <div class="user-select">
            <select name="compiler">
                Clang++17 Diagnostics
                <option value="1">GNU G++17 7.3.0</option>
                <option value="2">PHP 7.0.12</option>
                <option value="3">Rust 1.26</option>
                <option value="4">ActiveTcl 8.5</option>
                <option value="5"> Clang++17 Diagnostics</option>
                <option value="6">OpenCobol 1.0</option>
                <option value="7">C# Mono 5</option>
                <option value="8">D DMD32 v2.079.0</option> 
                <option value="9">Go 1.11</option>
                <option value="10">Haskell GHC 7.8.3</option>
                <option value="11">Java 1.8.0_162</option>
                <option value="12">Kotlin 1.2</option>
                <option value="13">JavaScript V8 4.8.0</option>
                <option value="14">Node.js 6.9.1</option>
                <option value="15">Microsoft Q#</option>
                <option value="16">Ruby 2.0.0p645</option>
                <option value="17">PascalABC.NET 2</option>
                <option value="18">Python 3.6</option>
            </select>
        </div>
        <br>

        <!--Source Code Section -->
        <div class="row-3">
            <h4>Source Code:</h4>
        </div>
        
        <div class="row-4">
            <form action="/website/OJ_Tutorials/app/problemset/d/submit.php">
                
                <br>
                <div class="buttonpos">
                    <input type="submit" class="button" value="SUBMIT">
                </div>
            </form>
        </div>
        
        <!-- Footer Section-->
        <div id="footer">
            &copy 2018 CodeCourses.com | All Rights Reserved
        </div>        
    </body>
</html>