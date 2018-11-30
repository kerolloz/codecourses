<?php require 'process.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
<div class="header">
    <h2>Register</h2>
</div>
<form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
    <?php require 'pr_errors.php'; ?>
    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" value="">
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" value="">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password1">
    </div>
    <div class="input-group">
        <label>Confirm password</label>
        <input type="password" name="password2">
    </div>
    <div class="input-group">
        <input type="submit" name="reg_usr" value="Register">
    </div>
    <p>
        Already a member? <a href="login.php">Sign in</a>
    </p>
</form>
</body>
</html>
