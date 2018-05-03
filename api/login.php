<?php
session_start();
require('../templates/initialization.php');

$con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
}
$post = $_POST;
if (!$post['email'] || !$post['password']) {
  $_SESSION['errors'] = "Username and Password is required!";
  header("Location: ". getBaseUrl() . "/login.php");
  die();
}

$email = $post['email'];
$password = $post['password'];
// Perform queries
$user = mysqli_query($con,"SELECT * FROM users WHERE email='$email' && password='$password'");
if ($user) {
  $_SESSION['user'] = $user;
  $_SESSION['errors'] = null;
  header("Location: ". getBaseUrl() . "/");
  die();
} else {
  $_SESSION['errors'] = "No User found!";
  header("Location: ". getBaseUrl() . "/login.php");
  die();
}
// mysqli_query($con,"INSERT INTO Persons (FirstName,LastName,Age)
// VALUES ('Glenn','Quagmire',33)");

mysqli_close($con);
?>
