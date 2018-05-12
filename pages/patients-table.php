<div class="card mb-3">
  <div class="card-header">
    <div class="row">
      <div class="col-sm-6">
        <i class="fa fa-group"></i> Manage Patient Records</i>
      </div>
      <div class="col-sm-6">
        <a href="<?php echo getBaseUrl() ?>/manage-patients/add.php" class="btn btn-outline-success btn-sm pull-right">
          <i class="fa fa-plus"></i> ADD NEW PATIENT
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
<!--       <?php if (isset($_SESSION['msg1'])) { ?>
          <div class="alert alert-success"  role="alert">
            <center><?php echo $_SESSION['msg1'] ?></center>
          </div>
      <?php } ?> -->
      <div class="alert alert-success dynamic-alert" role="alert" style="display: none;"><center class="error-messages"></center></div>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th><center>Full Name</center></th>
            <th><center>Address</center></th>
            <th><center>Contact Number</center></th>
            <th><center>Birth Date</center></th>
            <th><center>Email Address</center></th>
            <th><center>Gender</th>
            <div class="col">
            <th colspan="2"><center>Action</center></th>
            </div>
          </tr>
        </thead>
        <tbody>
          <?php $users = getUsers() ?>
          <?php while ($row = mysqli_fetch_array($users)) { ?>
          <tr>
            <td><?php echo $row['fname']; ?> <?php echo $row['mi']; ?> <?php echo $row['lname']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['contactNo']; ?></td>
            <td><?php echo $row['birthday']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td>
            <button type="button" class="btn btn-primary btn-sm"><a class="del_btn" href="../manage-patients/server.php?edit=<?php echo $row['id']; ?>">Edit</a></button>
            <button type="button" class="btn btn-primary btn-sm" onclick="deletePatient(<?php echo $row['id'] ?>)">Delete</button>
            </td>
          </tr>
          <?php } ?>    
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
<!-- CSS -->
<!-- Page level plugin CSS-->
<link href="<?php echo getBaseUrl() ?>/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

<!-- SCRIPTS -->
<script src="<?php echo getBaseUrl() ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo getBaseUrl() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo getBaseUrl() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="<?php echo getBaseUrl() ?>/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo getBaseUrl() ?>/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for this page-->
<script src="<?php echo getBaseUrl() ?>/assets/js/sb-admin-datatables.min.js"></script>
<script type="text/javascript">
  function deletePatient(idx) {
    let url = "<?php echo getBaseUrl() ?>/api/getPatientInfoDelete.php";
    // $(".modal-message").html('<span class="fa fa-spinner fa-spin"></span> Loading patient info...');
    $.post(url, {id: idx}, function (result) {
      $("#deleteModalpatient").html(result);
      $("#deleteModalpatient").modal('show');
    });
  }
</script>