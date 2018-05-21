<?php include("templates/header.php"); ?>
<?php
  if (isset($_SESSION['user'])) {
    header("Location: ". getBaseUrl() . "/");
    die();
  }
?>
<body class="bg-secondary">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><center><b>Smart BP Monitoring</b></center></div>
      <div class="card-body">
        <?php if (isset($_SESSION['errors'])) { ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['errors'] ?>
            <?php unset($_SESSION['errors']) ?>
          </div>
        <?php } ?>
        <form method="POST" action="<?php echo getBaseUrl() ?>/api/login.php">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="InputEmail" type="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="InputPassword" type="password" name="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
          <button class="btn btn-primary btn-block">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>