<?php include("../templates/header.php"); ?>
<?php require("../templates/database.php"); ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php include("../templates/navbar.php"); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Manage Records</a>
        </li>
        <li class="breadcrumb-item active">My Records</li>
      </ol>
      <?php include("../pages/change-password-admin.php"); ?>
    </div>

    <?php include("../templates/footer.php"); ?>
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <?php include("../templates/logout-modal.php"); ?>
    <?php include("../templates/javascript.php"); ?>
  </div>
</body>
</html>