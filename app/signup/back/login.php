<?php require 'process.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Login</h2>
    </div>

    <form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
        <?php require 'pr_errors.php'; ?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" 
                <?php 
                    if ($errors) {
                        echo 'value="'. htmlentities($username) .'"';
                    }
                ?>
             >
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" >
        </div>
        <div class="input-group">
            <input class="in" type="submit" name="login" value="Login">
        </div>
        <p>Not a member? <a href="register.php">Sign up</a></p>
    </form>
</body>
</html>