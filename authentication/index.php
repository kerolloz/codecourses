<?php require 'process.php';?>
<!doctype html>
<html>
    <head>
        <title>Sign In</title>

        <!--Required meta tags for BS-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--BS CSS-->
        <link rel="stylesheet" href="../assets/bootstrap-4.1.3-dist/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="../assets/bootstrap-4.1.3-dist/css/bootstrap.min.css">

        <!--Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Text+Me+One" rel="stylesheet"> 
        
        <!--Custom CSS-->
        <link rel="stylesheet" href="style.css">        
    </head>

    <body>
        <!--Navbar Section-->
        <nav>
            <img src="../assets/images/codeCourses.png" 
                    class = "nav-left"
                    id = "imgMobile">
        </nav>
        
        <!--Sign In/Up Card-->
        <div class="color">
            <div class="container signin-container">
                <!--Choice btns-->
                <div class="row rbtnrow">
                    <div id="signin-btn" class="col-6 sbtn" onclick="signIn()">Sign In</div>
                    <div id="signup-btn" class="col-6 sbtn" onclick="signUp()">Sign Up</div>
                </div>
                
                <div class="row">
                    <!--Sign In Card-->
                    <div id="signinCard" class="col-12">
                        <div class="card signin-card">
                            <div class="card-body">
                                <div class="blur"></div>
                                <h1 class="signin-header">Sign In</h1>

                                <form class="signin-form" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
                                    <?php require 'pr_errors.php'; ?>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="emailInput" placeholder="Email" name="email"
                                            <?php
                                            if ($errors) {
                                                echo 'value="'. htmlentities($email) .'"';
                                            }
                                            ?>
                                        >
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" id="passwordInput" placeholder="Password" name="password">
                                    </div>

                                    <button type="submit" class="btn signin-button" name="login">Sign In</button>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">Remember me.<a href="#" class="need-help"> Need Help?</a>
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!--Sign Up Card-->
                    <div id="signupCard" class="col-12">
                        <div class="card signin-card">
                            <div class="card-body">
                                <h1 class="signin-header">Sign Up</h1>
                                <form class="signin-form" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
                                    <?php require 'pr_errors.php'; ?>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="fnameInput" placeholder="First Name" name="fname"
                                                    <?php
                                                    if($errors) {
                                                        echo 'value="' . htmlentities($fname) .'"';
                                                    }
                                                    ?>
                                                >
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="lnameInput" placeholder="Last Name" name="lname"
                                                    <?php
                                                    if($errors) {
                                                        echo 'value="' . htmlentities($lname) .'"';
                                                    }
                                                    ?>
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="emailInput" placeholder="Email" name="email"
                                            <?php
                                            if ($errors) {
                                                echo 'value="'. htmlentities($email) .'"';
                                            }
                                            ?>
                                        >
                                    </div>
        
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="usernameInput" placeholder="Username" name="username"
                                            <?php
                                            if($errors) {
                                                echo 'value="' . htmlentities($username) .'"';
                                            }
                                            ?>
                                        >
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" id="passwordInput" placeholder="Password" name="password1">
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" id="passwordConInput" placeholder="Password Confirmation" name="password2">
                                    </div>

                                    <button type="submit" class="btn signin-button" name="reg_usr">Sign Up</button>


                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!--Scripts for BS-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-
        q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="assets/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>

        <!--Custom JS-->
        <script src="script.js"></script>
    
    </body>

</html>