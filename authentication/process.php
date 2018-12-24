<?php
session_start();

$servername = "localhost";
$sqlUsername = "root";
$password = "";
$db = "ojDB";
$passwordSalt= "^>.2k2m+ya$?";

$reg_errors = [];           //Errors Array
$log_errors = [];           //Errors Array


$fname = $lname = $username = $email = $password1 = $password2 = '';



$conn = mysqli_connect("$servername", "$sqlUsername", "$password", "$db");

// Data comes from register form >> 

if (isset($_POST['reg_usr'])) {

  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
  $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

  if(empty($fname)) { array_push($reg_errors, "Enter Your First Name"); }
  if(empty($lname)) { array_push($reg_errors, "Enter Your Last Name"); }
  if (empty($username)) { array_push($reg_errors, "Username is required"); }
  if (empty($email)) { array_push($reg_errors, "Email is required"); }
  if (empty($password1)) { array_push($reg_errors, "Password is required"); }
  if ($password1 != $password2) {
    array_push($reg_errors, "The two passwords do not match");
  }

  // Check database to make sure 
  // a user does not already exist
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {

      array_push($reg_errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($reg_errors, "email already exists");
    }
  }

  if (count($reg_errors) == 0) {
    $password = md5("$password1" . "$passwordSalt");

    $query = "INSERT INTO users (first_name, last_name, username, email, password) 
              VALUES('$fname', '$lname', '$username', '$email', '$password')";

    mysqli_query($conn, $query);
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    header('location: ../index.php');
  }
}


// Data comes from login form
if (isset($_POST['login'])) {

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  if (empty($email)) {
    array_push($log_errors, "Email is required");
  }
  if (empty($password)) {
    array_push($log_errors, "Password is required");
  }

  if (count($reg_errors) == 0) {
    $password = md5("$password" . "$passwordSalt");
    $user_check_query = "SELECT * FROM users WHERE email='$email' and password='$password' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) == 1) {

        $_SESSION['fname']=$user[first_name];
        $_SESSION['lname']=$user[last_name];
        $_SESSION['username']=$username;
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['is_logged_in'] = true;
        header('location: ../index.php');

    }
    else  {
      array_push($log_errors, "Wrong username/password combination");
    }
  }
}