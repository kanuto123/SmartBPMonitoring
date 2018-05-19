<?php
  session_start();
  require('../templates/initialization.php');
  $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
  }
  if(isset($_GET['q'])) {
    $q = $_GET['q'];
    if ($q == "") {
      $query = "SELECT * FROM patient";
    } else {
      $query = "SELECT * FROM patient WHERE fname LIKE '%$q%' OR lname LIKE '%$q%' OR mi LIKE '%$q%'";
    }
  } else {
    $query = "SELECT * FROM patient";
  }
  $ret = mysqli_query($con, $query);
  $patient = [];
  while($result = mysqli_fetch_assoc($ret)) {
    $patient['results'][] = [
      "id"        => $result['id'],
      "text"      => $result['fname'] . " " . $result['mi'] . " " . $result['lname'],
      "selected"  => true
    ];
  }

  echo json_encode($patient, 200);
?>
