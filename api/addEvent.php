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
	// print_r($_POST);
	// die();
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
		echo json_encode($json, 200);
		die();
	}

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