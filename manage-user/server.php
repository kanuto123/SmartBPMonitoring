<?php
session_start();
require('../templates/initialization.php');
$con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
}
if (isset($_GET['del'])){
		$id = $_GET['del'];
        $query = "DELETE FROM users WHERE id='$id'";
		mysqli_query($con, $query);
		$_SESSION['msg'] = "USER DELETED";
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
	

	/*if (!$_POST['fname'] || !$_POST['lname']) {
		$_SESSION['errors'] = "Username and Password is required!";
		header("Location: ". getBaseUrl() . "/manage-patients/add.php");
  		die();
	}*/
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
		$_SESSION['errors']['contactno'] = 'Contact Number is required.'; 
	}
	if (!isset($birthday) || $birthday === "") {
		$_SESSION['errors']['bday'] = 'Birth Date is required.'; 
	}
	if (!isset($email) || $email === "") {
		$_SESSION['errors']['email'] = 'Email address is required.'; 
	}
	if (!isset($gender) || $gender === "") {
		$_SESSION['errors']['gender'] = 'Gender is required.'; 
	}
// $post = $_POST;
// if (!$post['fname'] || !$post['lname'] || !$post['address'] || !$post['bday'] || !$post['mi'] || !$post['email'] 	
// 	|| !$post['gender'] || !$post['contactno']) {
//   $_SESSION['errors'] = "Enter Required Fields!";
//   header("Location: ". getBaseUrl() . "/manage-patients/add.php");
//   die();
// }
// search length of array
	if (isset($_SESSION['errors']) || count($_SESSION['errors']) > 0) {	
		print_r($_SESSION['errors']);
		header("Location: ". getBaseUrl() . "/manage-patients/add.php");
		die();
	}
	$query = "INSERT INTO users (fname,lname,address,birthday,mi,email,gender,contactNo) VALUES ('$fname' , '$lname', '$address', '$bday', '$mi', '$email', '$gender', '$contactno')";
	$test = mysqli_query($con, $query);
	$_SESSION['msg'] = "PATIENT SAVED";
	header("Location: ". getBaseUrl() . "/manage-user/add.php");
	die(); 	//redirect to index page after inserting
	}
//update
//	if (isset($_POST['update'])) {
//		 $Fname  = mysqli_real_escape_string($_POST['Fname']);
//		 $Lname = mysqli_real_escape_string($_POST['Lname']);
//		 $address = mysqli_real_escape_string($_POST['address']);
//		 $Bday = mysqli_real_escape_string($_POST['Bday']);
//		 $id = mysqli_real_escape_string($_POST['id']);
//
//		mysqli_query($db, "UPDATE info SET Fname='$Fname',Lname='$Lname',address='$address',Bday='$Bday' WHERE id=$id");
//		$_SESSION['msg'] = "Address updated";
//		header('location: index.php');
//	}
//delete
	/*if (isset($_GET['del'])){
		$id = $_GET['del'];
               $query = "DELETE FROM user WHERE id='$id'";
		mysqli_query($con, $query);
		if (mysqli_query($con, $query)) {
			echo "Record deleted successfully";
			} else {
			echo "Error deleting record: " . mysqli_error($con);
			}
		$_SESSION['msg'] = "USER DELETED";
		/*header("Location: ". getBaseUrl() . "/manage-user/index.php");*/
	
////retrieve records
	$results = mysqli_query($con,"SELECT * FROM users");
mysqli_close($con);
?>