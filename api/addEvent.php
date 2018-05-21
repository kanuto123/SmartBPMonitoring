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
<<<<<<< HEAD
=======
	// print_r($_POST);
	// die();
<<<<<<< HEAD
	$eventName = $_POST['eventName'];
	$bp1 = $_POST['bp1'];
	$bp2 = $_POST['bp2'];

	$array = ['test', 'test'];
	if (!isset($eventName) || $eventName === "") {
		$json['errors']['eventName'] = 'Event name is required.';
	}
	if (!isset($bp1) || $bp1 === "") {
		$json['errors']['bp1'] = 'Blood Pressure 1 is required.'; 
	}
	if (!isset($bp2) || $bp2 === "") {
		$json['errors']['bp2'] = 'Blood Pressure 2 is required.'; 
	}

	if (isset($json['errors'])) {	
=======
>>>>>>> ec055ef779924ad7d8c7e8bb69c608f932dc4aba
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
>>>>>>> 47fba6114cdf5d2ffaa50cb2bdc373d152e9305a
		echo json_encode($json, 200);
		die();
	}

<<<<<<< HEAD
// Perform queries
	$query = "INSERT INTO records (eventName,start_date,end_date,bp1,bp2,allDay) VALUES ('$eventName', , , '$bp1', '$bp2', '$allDay')";
	mysqli_query($con, $query);
	/*$patientId = mysqli_insert_id($con);
	$password = str_replace("-", "", $birthday);
	$password = md5($password);

	$queryUser = "INSERT INTO users (patient_id,email,fname,lname,mi,password,address,contactNo, gender, birthday) VALUES ($patientId , '$email', '$fname', '$lname', '$mi', '$password', '$address', '$contactNo', '$gender', '$birthday')";
	mysqli_query($con, $queryUser);*/

	$json['messages'] = "Event successfully added!";
	$json['is_successful'] = true;
   	mysqli_close($con);
	echo json_encode($json, 200);
	die();
}
?>
=======
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
>>>>>>> 47fba6114cdf5d2ffaa50cb2bdc373d152e9305a
