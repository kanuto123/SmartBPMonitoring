<?php
// database query and calls
function login($username, $password) {
  $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
  // Perform queries
  // mysqli_query($con,"SELECT * FROM Persons");
  // mysqli_query($con,"INSERT INTO Persons (FirstName,LastName,Age)
  // VALUES ('Glenn','Quagmire',33)");

  mysqli_close($con);
}


$session = $_SESSION;
if (!$session['user']) {
  header('Location: '.getBaseUrl().'/login.php');
  die();
}
?>
