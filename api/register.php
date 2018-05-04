<?php
session_start();
require('../templates/initialization.php');

$con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
}

        $fname = mysqli_real_escape_string($con, $post['fname']);
        $lname = mysqli_real_escape_string($con, $post['lname']);
        $email = mysqli_real_escape_string($con, $post['email']);
        $password = mysqli_real_escape_string($con, $post['password']);

$post = $_POST;
if (!$post['fname'] || !$post['lname'] !$post['email'] || !$post['password'] ||) {
  $_SESSION['errors'] = "Blank Fields";
  header("Location: ". getBaseUrl() . "/login.php");
  die();
}
// Perform queries
$query = "INSERT INTO users (firstname, lastname, email, password) 
          VALUES ('$fname', '$lname', '$email', 'password')";
$res = mysqli_query($con,$query);
$user = mysqli_fetch_assoc($res);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ". getBaseUrl() . "/login.php");
    die();
    } else {
      $sql = "SELECT users WHERE email='$email'";
      $res = mysqli_query($con, $sql);
      $resultCheck = mysqli_num_rows($res);
}
    if (resultCheck > 0) {
    header("Location: ". getBaseUrl() . "/login.php");
    exit();
    } else {
      $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
      $sql = "INSERT INTO users (user_fname, user_lname, user_email, user_pwd) VALUES ('$fname', '$lname', '$email', '$hashedPwd');";
      mysqli_query($con, $sql);
    header("Location: ". getBaseUrl() . "/login.php");
    exit(); 
  }
 //   if ($user) {
 //     if ($user['password'] == $password) {
 //       $_SESSION['user'] = $user;
 //       $_SESSION['errors'] = null;
 //       header("Location: ". getBaseUrl() . "/");
 //       die();
 //     } else {
 //       $_SESSION['errors'] = "Password Incorrect!";
 //       header("Location: ". getBaseUrl() . "/login.php");
 //       die();
 //     }
 //   } else {
 //     $_SESSION['errors'] = "No User found!";
 //     header("Location: ". getBaseUrl() . "/login.php");
 //     die();
 //   }
// mysqli_query($con,"INSERT INTO Persons (FirstName,LastName,Age)
// VALUES ('Glenn','Quagmire',33)");

mysqli_close($con);
?>
