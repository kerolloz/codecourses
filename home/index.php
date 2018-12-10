<!doctype html>
<html>
    <head>
        <title>CodeCourses</title>
        <link rel="stylesheet" href= "style.css">
        <script src="script.js"></script>
    </head>
    <body>
        <!--include navigation bar from a preset php file-->
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/codecourses/navbar_control.php";?>
        

        <!--Home Section-->
        <div class="homeContainer">
            <div class="row">
                <div class="col-6">
                    <div class="push-left">
                        <ul>
                            <li>Want to learn Problem Solving?</li>
                            <li>Practice in the same place as well?</li>
                            <li>Join Us Now!</li>
                        </ul>
                    </div>
                </div>

                <div class="col-6">
                    <div class="videoContainer">
                        <video width="500" height="282" 
                        controls="controls" 
                        type="video/mp4">
                            <source src="/codecourses/assets/ACPC_2017.mp4" autostart="false">
                        </video>
                    </div>

                </div>
            </div>
            
        </div>


        <!--About Website Section-->
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="box">
                        <div class="icon">
                            <img src="/codecourses/assets/images/codeCourses_opt_opt.png">
                        </div>
                        <br>
                        <label>Problem Set</label>
                        <hr>
                        <p>A large, varient and good staff of problems
                            that you can solve depending on your level 
                            even if you are still absolute beginner or 
                            an ACM ICPC world finalist. 
                        </p>
                    </div>
                </div>

                <div class="col-4">
                    <div class="box">
                        <div class="icon">
                            <img src="/codecourses/assets/images/codeCourses_opt_opt.png">
                        </div>
                        <br>
                        <label>Road Map</label>
                        <hr>
                        <p>With us, now you can know how to start 
                            you journy with problem solving. If you
                            have already started and don't know how
                            to keep going or what to do next, we are here
                            also to guide you to be a professional.
                        </p>
                    </div>
                </div>

                <div class="col-4">
                    <div class="box">
                        <div class="icon">
                            <img src="/codecourses/assets/images/codeCourses_opt_opt.png">
                        </div>
                        <br>
                        <label>Contests</label>
                        <hr>
                        <p>When time to test yourself comes, you will find 
                            range of contests with their upcoming dates and 
                            duration.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Section-->
        <div id="footer">
            &copy 2018 CodeCourses.com | All Rights Reserved
        </div>        
    </body>
</html>