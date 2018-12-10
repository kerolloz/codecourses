<!doctype html>
<html>
    <head>
        <title>CodeCourses</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        <!--Navbar Section-->
        <nav>
            <img src="/codecourses/assets/images/codeCourses.png" 
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

        <!-- Home Section -->
        <div class="row-2">
            <div class="col-6">
                <div class="videoContainer">
                     <iframe width="800" height="500" 
                        src="https://www.youtube.com/embed/Syx2qDjj7TE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
            </div>
            <!-- Lessons -->
            <div class="col-6">
                <div class="lessons">
                    <a href="###">Primes</a>
                    <br><br><br>
                    <a href="###">Factorization </a>
                    <br><br><br>
                    <a href="###">Factorial</a>
                    <br><br><br>
                    <a href="###">Fib, GCD, LCM, Pow</a>
                    <br><br><br>
                    <a href="###">Extended Euclidean algorithm</a>
                    <br><br><br>
                    <a href="###">Diophantine equation</a>
                    <br><br><br>
                    <a href="###">Modular multiplicative inverse</a>
                    <br><br><br>
                    <a href="###">Modular Arithmetic Apps</a>
                    <br><br><br>
                    <a href="###">Chinese Remainder Theorem</a>
                    <br><br><br>
                </div>
            </div>
        </div>
        

        <!-- Accordion Collapse -->
        
        <div class="accordion" id="accordionExample">
            <!-- Resources -->
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                style>
                            Resources
                        </button>
                    </h5>
                </div>
                
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <br> 
                        <a href="###" target="_blank">Article 1</a>
                        <br><br>
                        <a href="###" target="_blank">Article 2</a>
                        <br><br>
                        <a href="###" target="_blank">Article 3</a>
                        <br><br>
                    </div>
                </div>
            </div>
            
            <!-- Problems -->
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Problems
                        </button>
                    </h5>
                </div>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <br> 
                        <a href="###" target="_blank">Problem 1</a>
                        <br><br>
                        <a href="###" target="_blank">Problem 2</a>
                        <br><br>
                        <a href="###" target="_blank">Problem 3</a>
                        <br><br>
                        <a href="###" target="_blank">Problem 4</a>
                        <br><br>
                        <a href="###" target="_blank">Problem 5</a>
                        <br><br>
                    </div>
                </div>
            </div>
            
        
        </div>
        
        

        <!-- Footer Section-->
        <div id="footer">
            &copy 2018 CodeCourses.com | All Rights Reserved
        </div>        

        <script src="js/jQuery.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/script.js"></script>

    </body>
</html>