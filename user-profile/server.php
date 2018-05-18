<?php
session_start();
require('../templates/initialization.php');
$con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
}

	if (isset($_POST['update'])) {
		$fname  = $_POST['fname'];
		$lname = $_POST['lname'];
		$address = $_POST['address'];
		$mi  = $_POST['mi'];
		$contactNo  = $_POST['contactNo'];
		$id = $_POST['id'];
		$patient_id = $_POST['patient_id'];
		$password = md5($_POST['password']);
		$password2 = md5($_POST['password2']);

		if($password == $password2){
			$query = "UPDATE users SET fname='$fname',lname='$lname',address='$address',mi='$mi',contactNo='$contactNo',password='$password' WHERE id=$id";
			
			$res = mysqli_query($con, $query);
			$_SESSION['msg'] = "User updated";

			$searchQuery = "SELECT * FROM patient WHERE id=$patient_id LIMIT 1";
			$res = mysqli_query($con, $searchQuery);
			$patient = mysqli_fetch_assoc($res);
			$patientid = $patient['id'];
			$query = "UPDATE patient SET fname='$fname',lname='$lname',address='$address',mi='$mi',contactNo='$contactNo' WHERE id=$patient_id";
			$res = mysqli_query($con, $query);
			
			header("Location:". getBaseUrl() . "/user-profile/profile.php");
			die();
		}
		else if ($password != $password2) {
			$_SESSION['errormsg'] = "Password does not match.";
			header("Location:". getBaseUrl() . "/user-profile/profile.php");
		}
	}

	if (isset($_POST['updateAdmin'])) {
		$id = $_POST['id'];
		$password = md5($_POST['password']);
		$password2 = md5($_POST['password2']);

		if($password == $password2){
			$query = "UPDATE users SET password='$password' WHERE id=$id";
			
			$res = mysqli_query($con, $query);
			$_SESSION['msg'] = "User updated";

			header("Location:". getBaseUrl() . "");
			die();
		}
		else if ($password != $password2) {
			$_SESSION['errormsg'] = "Password does not match.";
			header("Location:". getBaseUrl() . "/user-profile/change-password-admin.php");
		}
	}
////retrieve records
	$results = mysqli_query($con,"SELECT * FROM users");
	mysqli_close($con);
?>