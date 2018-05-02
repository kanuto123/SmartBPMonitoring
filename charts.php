<?php include("templates/header.php"); ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
<?php include("templates/navbar.php"); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Records</li>
      </ol>
      <!-- Area Chart Example-->
      <?php include("pages/charts.php"); ?>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   <?php include("templates/footer.php"); ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <?php include("templates/logout-modal.php"); ?>
    <!-- Bootstrap core JavaScript-->
    <?php include("templates/javascript.php"); ?>
  </div>
</body>

</html>
