<?php
  session_start();
  require('../templates/initialization.php');
  $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
  }
  date_default_timezone_set("Asia/Manila");
  $start  = $_GET['start']." 00:00:01";
  $end    = $_GET['end']." 23:59:59";

  if(isset($_GET['patientId'])) {
    $patientId = $_GET['patientId'];
    $query = "SELECT * FROM records WHERE patient_id=$patientId AND (start_date BETWEEN '$start' AND '$end')";
  } else {
    if (isset($_GET['type'])) {
      $type = $_GET['type'];
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
    }

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
      "allDay" => false,
      "timeTaken" => date("M d Y - h:i a", strtotime($result['start_date'])),
      "BP" => "(" . $result['bp1'] . "/" . $result['bp2'] . ")",
      "patientName" => $result['eventName']
    ];
  }
  echo json_encode($events, 200);
?>
