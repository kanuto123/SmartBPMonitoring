 <?php
// database query and calls
function updateUser(){
 $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $id = $_GET['edit'];
  return $results = mysqli_query($con,"SELECT * FROM patient WHERE id=$id"); 
}

function getUsers() {
  $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  return $results = mysqli_query($con,"SELECT * FROM patient");
}

function getUserWithPatient() {
  $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $query = "SELECT users.id, users.patient_id, patient.address, patient.email, CONCAT(users.lname, ', ', users.fname, ' ', users.mi, '.') as fullname, patient.birthday, patient.gender, patient.contactNo FROM users
            INNER JOIN patient ON users.patient_id = patient.id
            ORDER BY users.id DESC";
            // print_r($query);
  $results = mysqli_query($con,$query);
  // $users = [];
  // while($output = mysqli_fetch_assoc($results)) {
  //   $users[] = $output;
  // }
  // echo "<pre>";
  // print_r($users);
  // echo "</pre>";
  // die();
  return $results;
}

function getUserStaffs() {
  $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $query = "SELECT CONCAT(lname, ', ', fname, ' ', mi) as fullname, email, address, contactNo, gender, birthday, id FROM users WHERE patient_id = 0";
  $results = mysqli_query($con,$query);
  return $results;
}

function register($patient_id, $fname, $lname, $mi, $email, $password) {
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
