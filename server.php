<?php
	$fname = "";
	$lname = "";
	$email = "";
	$errors = array();
	
	$db = mysqli_connect('localhost', 'root', '', 'registration');

	if (isset($_POST['register'])) {
		$fname = mysqli_real_escape_string($_POST['fname']);
		$lname = mysqli_real_escape_string($_POST['lname']);
		$email = mysqli_real_escape_string($_POST['email']);
		$pwd_1 = mysqli_real_escape_string($_POST['pwd_1']);
		$pwd_2 = mysqli_real_escape_string($_POST['pwd_2']);

		if (empty($fname)) {
			array_push($errors, "First Name is required");
		}
		if (empty($lname)) {
			array_push($errors, "Last Name is required");
		}
		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($pwd)) {
			array_push($errors, "Password is required");
		}
		if ($pwd_1 != $pwd_2) {
			array_push($errors, "Password do not match");
			}
		if (count($errors) == 0) {
			$pwd = md5($pwd_1);
			$sql = "INSERT INTO users (fname, lname, email, pwd) 
					VAlUES ('$fname', '$lname', '$email', '$pwd')";
			mysqli_query($db, $sql);
		}
	}
 ?>