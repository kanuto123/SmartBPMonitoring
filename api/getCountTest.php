<?php
session_start();
require('../templates/initialization.php');
date_default_timezone_set("Asia/Manila");
$con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
}
$get = $_GET;
// if (!$_SESSION['user']['patient_id']) {
//   $json['error'] = "You are not allowed to view this data.";
//   $json['is_succesful'] = false;
//   echo json_encode($json, 201);
//   die();
// }
if (!$get['type']) {
  $json['error'] = "Failed loading records.";
  $json['is_succesful'] = false;
  echo json_encode($json, 201);
  die();
}
$type = ucwords(trim($get['type']));
// Perform queries
if ($type === "DAILY") {
  $start = date("Y-m-d 00:00:01");
  $end   = date("Y-m-d 23:59:59");
} elseif ($type === "WEEKLY") {
  $week = date("W");
  $year = date("Y");
  $start = date("Y-m-d", strtotime("{$year}-W{$week}-1"));
  $end = date("Y-m-d", strtotime("{$year}-W{$week}-7"));
} elseif ($type === "MONTHLY") {
  $start = date("Y-m-01 00:00:01");
  $end   = date("Y-m-t 23:59:59");
} elseif ($type === "YEARLY") {
  $start = date("Y-01-01 00:00:01");
  $end   = date("Y-12-t 23:59:59");
}
$query = "SELECT COUNT(id) as count FROM records WHERE start_date BETWEEN '$start' AND '$end'";
$res = mysqli_query($con,$query);
$result = mysqli_fetch_assoc($res);
if ($result) {
  $json['count'] = $result['count'];
  $json['is_succesful'] = true;
} else {
  $json['error'] = "Failed running counter!";
  $json['is_succesful'] = false;
}
mysqli_close($con);

echo json_encode($json, 200);
die();
?>
