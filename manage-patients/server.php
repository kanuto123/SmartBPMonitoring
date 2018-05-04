<?php
require('../templates/initialization.php');
$con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
}
//save button 
if (isset($_POST)){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$address = $_POST['address'];
	$bday = $_POST['bday'];
	$mi = $_POST['mi'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$contactno = $_POST['contactno'];
	
// $post = $_POST;
// if (!$post['fname'] || !$post['lname'] || !$post['address'] || !$post['bday'] || !$post['mi'] || !$post['email'] 	
// 	|| !$post['gender'] || !$post['contactno']) {
//   $_SESSION['errors'] = "Enter Required Fields!";
//   header("Location: ". getBaseUrl() . "/manage-patients/add.php");
//   die();
// }

	$query = "INSERT INTO patient (fname,lname,address,birthday,mi,email,gender,contactNo) VALUES ('$fname' , '$lname', '$address', '$bday', '$mi', '$email', '$gender', '$contactno')";
	$test = mysqli_query($con, $query);
	$_SESSION['msg'] = "Patient saved";
	header("Location: ". getBaseUrl() . "/manage-patients/add.php");
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
//	if (isset($_GET['del'])){
//		$id = $_GET['del'];
//		mysqli_query($db, "DELETE FROM info  WHERE id=$id");
//		$_SESSION['msg'] = "Address deleted";
//		header('location: index.php');
//	}
////retrieve records
?>