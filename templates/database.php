 <?php
// database query and calls
function updatePatient(){
 $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $id = $_GET['edit'];
  return $results = mysqli_query($con,"SELECT * FROM patient WHERE id=$id"); 
}

function getPatient() {
  $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  return $results = mysqli_query($con,"SELECT * FROM patient");
}

function getUserProfile() {
  $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $email = $_SESSION['email'];
  $query="SELECT * FROM users WHERE email='$email'";
  return $results = mysqli_query($con,$query);
}

function updateUser(){
 $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $id = $_GET['edit'];
  $patient_id = $_GET['editPid'];
  return $results = mysqli_query($con,"SELECT * FROM users WHERE id='$id' && patient_id='$patient_id'"); 
}

function getUser() {
  $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  return $results = mysqli_query($con,"SELECT * FROM users");
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
  $results = mysqli_query($con,$query);
  return $results;
}

function getUserStaffs() {
  $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $query = "SELECT CONCAT(lname, ', ', fname, ' ', mi) as fullname, email, address, contactNo, gender, birthday, id, patient_id FROM users WHERE patient_id = 0";
  $results = mysqli_query($con,$query);
  return $results;
}

function getUserDailyRecord() {
  $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  return $results = mysqli_query($con,"SELECT * FROM patient");
}

function getUserWeeklyRecord() {
  $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  return $results = mysqli_query($con,"SELECT * FROM patient");
}

function getUserMonthlyRecord() {
  $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  return $results = mysqli_query($con,"SELECT * FROM patient");
}

function getUserYearlyRecord() {
  $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  return $results = mysqli_query($con,"SELECT * FROM patient");
}

function getAdminDailyRecord() {
  $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  return $results = mysqli_query($con,"SELECT * FROM patient");
}

function getAdminWeeklyRecord() {
  $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  return $results = mysqli_query($con,"SELECT * FROM patient");
}

function getAdminMonthlyRecord() {
  $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  return $results = mysqli_query($con,"SELECT * FROM patient");
}

function getAdminYearlyRecord() {
  $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  return $results = mysqli_query($con,"SELECT * FROM patient");
}

function register($patient_id, $fname, $lname, $mi, $email, $password) {
  $con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
  // Check connection
  if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
  mysqli_close($con);
}

$session = $_SESSION;
if (!$session['user']) {
  header('Location: '.getBaseUrl().'/login.php');
  die();
}
?>
