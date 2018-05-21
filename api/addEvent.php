<?php
session_start();
require('../templates/initialization.php');

$con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
}

if (isset($_POST)){
	$patient = $_POST['patient'];
	$bp1 = $_POST['bp1'];
	$bp2 = $_POST['bp2'];
	$startDate = $_POST['startDate']." 00:00:00";

	if (!isset($patient) || $patient === "") {
		$json['errors']['patient'] = 'Patient is required.';
	}
	if (!isset($bp1) || $bp1 === "") {
		$json['errors']['bp1'] = 'Blood Pressure 1 is required.';
	}

  if (!is_numeric($bp1)) {
    $json['errors']['bp1'] = 'Blood Pressure 1 must be digit.';
  }

	if (!isset($bp2) || $bp2 === "") {
		$json['errors']['bp2'] = 'Blood Pressure 2 is required.';
	}

  if (!is_numeric($bp2)) {
    $json['errors']['bp2'] = 'Blood Pressure 2 must be digit.';
  }

  if (!isset($startDate) || $startDate === "") {
		$json['errors']['date'] = 'Date is required.';
	}

	if (isset($json['errors'])) {
    $json['is_successful'] = false;
		echo json_encode($json, 200);
		die();
	}

  $queryPatient = "SELECT * FROM patient WHERE id=$patient";
  $ret = mysqli_query($con, $queryPatient);
  $result = mysqli_fetch_assoc($ret);
  if ($result) {
    $eventName = $result['fname'] . " " . $result['mi'] . " " . $result['lname'];
  	$query = "INSERT INTO records (patient_id,eventName,start_date,end_date,bp1,bp2) VALUES ($patient, '$eventName', '$startDate', '$startDate', $bp1, $bp2)";
  	mysqli_query($con, $query);

  	$json['messages'] = "Event successfully added!";
  	$json['is_successful'] = true;
  } else {
    $json['error'] = "Patient not found.";
    $json['is_successful'] = false;
  }
 	mysqli_close($con);
	echo json_encode($json, 200);
	die();
}
?>
