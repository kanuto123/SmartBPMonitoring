<?php
  session_start();
  require('../templates/initialization.php');
  $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
  }

  $start  = $_GET['start']." 00:00:00";
  $end    = $_GET['end']." 00:00:00";

  if(isset($_GET['patientId'])) {
    $patientId = $_GET['patientId'];
    $query = "SELECT * FROM records WHERE patient_id=$patientId AND (start_date BETWEEN '$start' AND '$end')";
  } else {
    $query = "SELECT * FROM records WHERE start_date BETWEEN '$start' AND '$end'";
  }
  $ret = mysqli_query($con, $query);
  $events = [];
  while($result = mysqli_fetch_assoc($ret)) {
    $events[] = [
      "title" => $result['eventName'] . ": (" . $result['bp1'] . "/" . $result['bp2'] . ")",
      "start" => $result['start_date'],
      "end"   => $result['end_date'],
      "patientId" => $result['patient_id'],
      "allDay" => $result['allDay'] ? true : false
    ];
  }
  echo json_encode($events, 200);
?>