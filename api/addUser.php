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
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$address = $_POST['address'];
	$birthday = $_POST['birthday'];
	$mi = $_POST['mi'];
	$email = $_POST['email'];
	$gender = isset($_POST['gender']) ? $_POST['gender'] : "";
	$contactNo = $_POST['contactNo'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];


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
	if (!isset($password) || $password === "") {
		$json['errors']['password'] = 'Password is required.'; 
	}
	if (!isset($password2) || $password2 === "") {
		$json['errors']['password2'] = 'Password is required.'; 
	}
	if ($password !== $password2) {
		$json['errors']['password'] = 'Password does not match.'; 
	}
	if (isset($json['errors'])) {	
		echo json_encode($json, 200);
		die();
	}

// Perform queries
	$password = md5($password);
	$queryUser = "INSERT INTO users (patient_id,email,fname,lname,mi,password,address,contactNo,gender,birthday) VALUES (0 , '$email', '$fname', '$lname', '$mi', '$password', '$address', '$contactNo', '$gender', '$birthday')";
	mysqli_query($con, $queryUser);

	$json['messages'] = "User successfully added!";
	$json['is_successful'] = true;
   	mysqli_close($con);
	echo json_encode($json, 200);
	die();
}
?>