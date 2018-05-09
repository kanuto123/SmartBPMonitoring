s<?php include("templates/header.php"); ?>
<?php
  if (isset($_SESSION['users'])) {
    header("Location: ". getBaseUrl() . "/");
    die();
  }
?>
<body class="bg-secondary">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header"><center><b>Smart BP Monitring</b></center>
      <center>Register an Account</center></div>
      <div class="card-body">
        <form form method="POST" action="<?php echo getBaseUrl() ?>/api/register.php">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">First name</label>
                <input class="form-control" name="fname" type="text" aria-describedby="nameHelp" placeholder="Enter first name" required>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Last name</label>
                <input class="form-control" name="lname" type="text" aria-describedby="nameHelp" placeholder="Enter last name" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email" required>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" name="password" type="password" placeholder="Password" required>
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" name="password" type="password" placeholder="Confirm password" required>
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block">Register</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Login Page</a>
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
