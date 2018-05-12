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
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$address = $_POST['address'];
	$birthday = $_POST['birthday'];
	$mi = $_POST['mi'];
	$email = $_POST['email'];
	$gender = isset($_POST['gender']) ? $_POST['gender'] : "";
	$contactNo = $_POST['contactNo'];


	$array = ['test', 'test'];
	if (!isset($fname) || $fname === "") {
		$json['errors']['fname'] = 'First name is required.';
	}
	if (!isset($lname) || $lname === "") {
		$json['errors']['lname'] = 'Last name is required.'; 
	}
	if (!isset($mi) || $mi === "") {
		$json['errors']['mi'] = 'Middle Initial is required.'; 
	}
	if (!isset($address) || $address === "") {
		$json['errors']['address'] = 'Address is required.'; 
	}
	if (!isset($contactNo) || $contactNo === "") {
		$json['errors']['contactNo'] = 'Contact Number is required.'; 
	}
	if (!isset($birthday) || $birthday === "") {
		$json['errors']['birthday'] = 'Birth Date is required.'; 
	}
	if (!isset($email) || $email === "") {
		$json['errors']['email'] = 'Email address is required.'; 
	}
	if (!isset($gender) || $gender === "") {
		$json['errors']['gender'] = 'Gender is required.'; 
	}

	if (isset($json['errors'])) {	
		echo json_encode($json, 200);
		die();
	}

// Perform queries
	$query = "INSERT INTO patient (fname,lname,address,birthday,mi,email,gender,contactNo) VALUES ('$fname' , '$lname', '$address', '$birthday', '$mi', '$email', '$gender', '$contactNo')";
	mysqli_query($con, $query);
	$patientId = mysqli_insert_id($con);
	$password = str_replace("-", "", $birthday);
	$password = md5($password);

	$queryUser = "INSERT INTO users (patient_id,email,fname,lname,mi,password,address,contactNo, gender, birthday) VALUES ($patientId , '$email', '$fname', '$lname', '$mi', '$password', '$address', '$contactNo', '$gender', '$birthday')";
	mysqli_query($con, $queryUser);

	$json['messages'] = "Patient successfully added!";
	$json['is_successful'] = true;
   	mysqli_close($con);
	echo json_encode($json, 200);
	die();
}
?>