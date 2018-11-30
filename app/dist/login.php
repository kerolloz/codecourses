<?php
$errors = [];
$missing = [];
if (isset($_POST['login'])) {
    $expected = ['username', 'password'];
    $required = ['username', 'password'];
    require './includes/process.php';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h2>Enter Username and Password</h2>
	
	<?php if($errors || $missing) : ?>
		<p>Please fix the item(s) indicated</p>
	<?php endif; ?>

	<form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
		
		<p>
			
			<?php if($missing && in_array('username', $missing)) : ?>
				<span>Please Enter your username<br></span>
			<?php endif; ?>
			<input type="text" name="username" id="username" placeholder="Username" >
		</p>
		<p>
			<label></label>
			<?php if($missing && in_array('password', $missing)) : ?>
				<span>Please Enter your Password<br></span>
			<?php endif; ?>
			<input type="password" name="password" id = "password" placeholder="password">	
		</p>
		<p>
			<input type="submit" name="login" id="login" value="Login">	
		</p>
		
	</form>
</body>
</html>