<!doctype html>
<html>

<head>
    <title>CodeCourses</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!--include navigation bar from a preset php file-->
    <?php require_once  "../navbar_control.php"; ?>


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
                <iframe width="560" height="315" src="https://www.youtube.com/embed/JSD41GPaozU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                    <label><a href="../problemset/index.php">Problem Set</a></label>
                    <hr>
                    <p>A large, varient and good staff of problems
                        that you can solve depending on your level and experience
                        even if you are still an absolute beginner or
                        an ACM-ICPC world finalist.
                    </p>
                </div>
            </div>

            <div class="col-4">
                <div class="box">
                    <div class="icon">
                        <img src="/codecourses/assets/images/codeCourses_opt_opt.png">
                    </div>
                    <br>
                    <label><a href="../contests/index.php">Contests</a></label>
                    <hr>
                    <p>When it's time to test yourself, you will find a
                        range of contests with their upcoming dates and
                        durations. These contests will help you enhance your
                        problem-solving skills.
                    </p>
                </div>
            </div>

            <div class="col-4">
                <div class="box">
                    <div class="icon">
                        <img src="/codecourses/assets/images/codeCourses_opt_opt.png">
                    </div>
                    <br>
                    <label><a href="../roadmap/index.php">Road Map</a></label>
                    <hr>
                    <p>With us, now you can know how to start
                        you journy with problem solving. If you
                        have already started and don't know how
                        to keep going or what to do next, we are here
                        also to guide you to be a professional.
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer Section-->
    <?php require '../footer_include.php'; ?>

    <script src="../scripts/script.js"></script>

</body>

</html>
