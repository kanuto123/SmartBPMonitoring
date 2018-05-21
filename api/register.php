<?php
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
    $email = $_POST['email'];
    $password = md5($_POST['password']);



    $query = "INSERT INTO users (fname,lname,email,password) VALUES ('$fname' , '$lname', '$email', '$password')";
    $test = mysqli_query($con, $query);
    $_SESSION['msg'] = "Account Registered";
    header("Location: ". getBaseUrl() . "/manage-patients/add.php");
    die();  //redirect to index page after inserting
  }
  mysqli_close($con);
?>
