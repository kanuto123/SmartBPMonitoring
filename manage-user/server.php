<?php
session_start();
require('../templates/initialization.php');
$con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
}

	if (isset($_GET['edit']) && isset($_GET['editPid'])){
		echo $id = $_GET['edit'];
        	 $patient_id = $_GET['editPid'];
			 $query = "SELECT * FROM users WHERE id=$id && patient_id=$patient_id";
		$ret = mysqli_query($con, $query);

		header("Location: ". getBaseUrl() . "/manage-user/update.php?edit=$id&&editPid=$patient_id");
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
		$patient_id = $_POST['patient_id'];

		$query = "UPDATE users SET fname='$fname',lname='$lname',address='$address',birthday='$birthday',mi='$mi',gender='$gender',contactNo='$contactNo',email='$email' WHERE id=$id";
		
		$res = mysqli_query($con, $query);
		$_SESSION['msg'] = "User updated";

		$searchQuery = "SELECT * FROM patient WHERE id=$patient_id LIMIT 1";
		$res = mysqli_query($con, $searchQuery);
		$patient = mysqli_fetch_assoc($res);
		$patientid = $patient['id'];
		$query = "UPDATE patient SET fname='$fname',lname='$lname',address='$address',birthday='$birthday',mi='$mi',gender='$gender',contactNo='$contactNo',email='$email' WHERE id=$patient_id";
		$res = mysqli_query($con, $query);
		
		header("Location:". getBaseUrl() . "/manage-user/");
		die();
	}
	
if (isset($_GET['del'])){
		$id = $_GET['del'];
        $query = "DELETE FROM users WHERE id='$id'";
		mysqli_query($con, $query);
		$_SESSION['msg3'] = "USER DELETED";
		header("Location: ". getBaseUrl() . "/manage-user/index.php");
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
	$gender = $_POST['gender'];
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
		$_SESSION['errors']['birthday'] = 'Birth Date is required.'; 
	}
	if (!isset($email) || $email === "") {
		$_SESSION['errors']['email'] = 'Email address is required.'; 
	}
	if (!isset($gender) || $gender === "") {
		$_SESSION['errors']['gender'] = 'Gender is required.'; 
	}
// search length of array
	if (isset($_SESSION['errors']) || count($_SESSION['errors']) > 0) {	
		print_r($_SESSION['errors']);
		header("Location: ". getBaseUrl() . "/manage-patients/add.php");
		die();
	}
	$query = "INSERT INTO users (fname,lname,address,birthday,mi,email,gender,contactNo) VALUES ('$fname' , '$lname', '$address', '$birthday', '$mi', '$email', '$gender', '$contactNo')";
	$test = mysqli_query($con, $query);
	$_SESSION['msg4'] = "USER SAVED";
	header("Location: ". getBaseUrl() . "/manage-user/add.php");
	die(); 	//redirect to index page after inserting
	}
	
////retrieve records
	$results = mysqli_query($con,"SELECT * FROM users");
mysqli_close($con);
?>