<?php
session_start();
require('../templates/initialization.php');

$con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
}

	if (isset($_GET['edit'])){
		echo $id = $_GET['edit'];
		$query = "SELECT * FROM patient WHERE id=$id";
		$ret = mysqli_query($con, $query);
}
	if (isset($_POST['update'])) {
		$fname  = $_POST['fname'];
		$lname = $_POST['lname'];
		$address = $_POST['address'];
		$birthday = $_POST['bday'];
		$mi  = $_POST['mi'];
		$gender  = $_POST['gender'];
		$contactNo  = $_POST['contactNo'];
		$id = $_POST['id'];

	$query = "UPDATE patient SET fname='$fname',lname='$lname',address='$address',birthday='$birthday',mi='$mi',gender='$gender',contactNo='$contactNo' WHERE id=$id";
	$res = mysqli_query($con, $query);

	$json['messages'] = "Patient successfully updated!";
	$json['is_successful'] = true;
   	mysqli_close($con);
	echo json_encode($json, 200);
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
}
?>