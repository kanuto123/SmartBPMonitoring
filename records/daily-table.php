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
          <a href="../">Manage Records</a>
        </li>
        <li class="breadcrumb-item active">Daily Records</li>
      </ol>
      <!-- Area Chart Example-->
      <?php
        if(!$_SESSION['user']['patient_id'])
          include("../pages/admin-daily.php");
        else
          include("../pages/user-daily.php");
      ?>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include("../templates/footer.php"); ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
     <div class="modal fade" id="deleteModaluser" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabeluser" 
     aria-hidden="true"></div>
    <!-- Logout Modal-->
    <?php include("../templates/logout-modal.php"); ?>
  </div>
</body>
</html>