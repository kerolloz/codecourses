<?php require 'process.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <div>
        <h2>Login</h2>
    </div>

    <form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
        <?php require 'pr_errors.php'; ?>
        <div>
            <label>Username</label>
            <input type="text" name="username" 
                <?php 
                    if ($errors) {
                        echo 'value="'. htmlentities($username) .'"';
                    }
                ?>
             >
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" >
        </div>
        <div>
            <input type="submit" name="login" value="Login">
        </div>
        <p>Not a member? <a href="register.php">Sign up</a></p>
    </form>
</body>
</html>