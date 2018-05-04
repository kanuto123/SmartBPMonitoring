<?php 

if (isset($_POST['submit'])) {
	
	include_once'dbconnect.php';

	$fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
	$lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
	$email = mysqli_real_escape_string($conn, $_POST['user_email']);
	$pwd = mysqli_real_escape_string($conn, $_POST['user_pwd']);
	

	if (empty($fname) || empty($lname) || empty($email) || empty($pwd)) {
		header("Location: ../register.php?signup=empty");
		exit();
	} else {
		if (!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname)) {
		header("Location: ../register.php?signup=invalid");
		exit();
		}else {
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../register.php?signup=invalidemail");
		exit();
		} else {
			$sql = "SELCET * FROM usertable WHERE user_email='$email'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);

		if (resultCheck > 0) {
		header("Location: ../register.php?signup=emailalreayused");
		exit();
		} else {
			$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
			$sql = "INSERT INTO usertable (user_fname, user_lname, user_email, user_pwd) VALUES ('$fname', '$lname', '$email', '$hashedPwd');";
			mysqli_query($conn, $sql);
		header("Location: ../register.php?signup=success");
		exit();	
				}
			}
		}

	}
} else {
	header("Location: ../register.php");
	exit();
}
