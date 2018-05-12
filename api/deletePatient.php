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
  $json['error'] = "Failed loading patient info.";
  $json['is_successful'] = false;
  echo json_encode($json, 201);
  die();
}
$id = $post['id'];
// Perform queries
$query = "DELETE FROM patient WHERE id='$id'";
$res = mysqli_query($con,$query);
$json['message'] = "Patient successfully deleted!";
$json['is_successful'] = true;
mysqli_close($con);

echo json_encode($json, 200);
die();
?>