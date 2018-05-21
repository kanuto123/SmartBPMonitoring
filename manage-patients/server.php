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

		header("Location: ". getBaseUrl() . "/manage-patients/update.php?edit=$id");
		die();
	}

	if (isset($_POST['update'])) {
		$fname  = $_POST['fname'];
		$lname = $_POST['lname'];
		$address = $_POST['address'];
		$birthday = $_POST['bday'];
		$mi  = $_POST['mi'];
		$email  = $_POST['email'];
		$gender  = $_POST['gender'];
		$contactNo  = $_POST['contactNo'];
		$id = $_POST['id'];

		$query = "UPDATE patient SET fname='$fname',lname='$lname',address='$address',birthday='$birthday',mi='$mi',gender='$gender',contactNo='$contactNo',email='$email' WHERE id=$id";
		
		$res = mysqli_query($con, $query);
		$_SESSION['msg'] = "Patient updated";

		$searchQuery = "SELECT * FROM users WHERE patient_id=$id LIMIT 1";
		$res = mysqli_query($con, $searchQuery);
		$user = mysqli_fetch_assoc($res);
		$userId = $user['id'];
		$query = "UPDATE users SET fname='$fname',lname='$lname',address='$address',birthday='$birthday',mi='$mi',gender='$gender',contactNo='$contactNo',email='$email' WHERE id=$userId";
		$res = mysqli_query($con, $query);

		header("Location:". getBaseUrl() . "/manage-patients/");
		die();
	}
	if (isset($_GET['del'])){
		$id = $_GET['del'];
		$query = "DELETE FROM patient WHERE id='$id'";
		mysqli_query($con, $query);
		$_SESSION['msg1'] = "PATIENT DELETED";
		header("Location: ". getBaseUrl() . "/manage-patients/index.php");
		die();
	}

//save button 
if (isset($_POST)){
	unset($_SESSION['errors']);
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$address = $_POST['address'];
	$birthday = $_POST['birthday'];
	$mi = $_POST['mi'];
	$email = $_POST['email'];
	$gender = $_POST['gender']; /*? $_POST['gender'] : 'Male';*/
	$contactNo = $_POST['contactNo'];


	if (!isset($fname) || $fname === "") {
		$_SESSION['errors']['fname'] = 'First name is required.';
	}
	if (!isset($lname) || $lname === "") {
		$_SESSION['errors']['lname'] = 'Last name is required.'; 
	}
	if (!isset($mi) || $mi === "") {
		$_SESSION['errors']['mi'] = 'Middle Initial is required.'; 
	}
	if (!isset($address) || $address === "") {
		$_SESSION['errors']['address'] = 'Address is required.'; 
	}
	if (!isset($contactNo) || $contactNo === "") {
		$_SESSION['errors']['contactNo'] = 'Contact Number is required.'; 
	}
	if (!isset($birthday) || $birthday === "") {
		$_SESSION['errors']['bday'] = 'Birth Date is required.'; 
	}
	if (!isset($email) || $email === "") {
		$_SESSION['errors']['email'] = 'Email address is required.'; 
	}
	if (!isset($gender) || $gender === "") {
		$_SESSION['errors']['gender'] = 'Gender is required.'; 

// search length of array
	if (isset($_SESSION['errors']) || count($_SESSION['errors']) > 0) {	
		print_r($_SESSION['errors']);
		header("Location: ". getBaseUrl() . "/manage-patients/add.php");
		die();
	}
	$query = "INSERT INTO patient (fname,lname,address,birthday,mi,email,gender,contactNo) VALUES ('$fname' , '$lname', '$address', '$birthday', '$mi', '$email', '$gender', '$contactno')";
	$test = mysqli_query($con, $query);
	$_SESSION['msg'] = "PATIENT SAVED";
	header("Location: ". getBaseUrl() . "/manage-patients/add.php");
	die(); 	//redirect to index page after inserting
}}

////retrieve records
	$results = mysqli_query($con,"SELECT * FROM patient");
	mysqli_close($con);
?>