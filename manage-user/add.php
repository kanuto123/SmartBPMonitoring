<?php include("../templates/header.php"); ?>
<?php require("../templates/database.php"); ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
 <?php include("../templates/navbar.php"); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo getBaseUrl() ?>/manage-user/">Manage User</a>
        </li>
        <li class="breadcrumb-item active">Add User</li>
      </ol>
      <!-- Example DataTables Card-->
      <?php include("../pages/user-form.php"); ?>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include("../templates/footer.php"); ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <?php include("../templates/logout-modal.php"); ?>
    <!-- Bootstrap core JavaScript-->
    <?php include("../templates/javascript.php"); ?>
  </div>
</body>

</html>
