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
if (!$post['id']) {
  $json['errors'] = "Failed loading user info.";
  $json['is_succesful'] = false;
  echo json_encode($json, 201);
  die();
}
$id = $post['id'];
// Perform queries
$query = "SELECT * FROM users WHERE id='$id'";

$res = mysqli_query($con,$query);
$users = mysqli_fetch_assoc($res);
if ($patient) { 
  $json['users'] = $users;
  $json['is_succesful'] = true;
} else {
  $json['errors'] = "User not found!";
  $json['is_succesful'] = false;
}
mysqli_close($con);

echo json_encode($json, 200);
die();
?>