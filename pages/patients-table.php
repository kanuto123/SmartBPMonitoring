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
      <div class="alert alert-success dynamic-alert" role="alert" style="display: none;"><center class="error-messages"></center></div>
      <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
        <thead>
          <th><center>Name</center></th>
          <th><center>Address</center></th>
          <th><center>Contact Number</center></th>
          <th><center>Email Address</center></th>
          <th><center>Gender</th>
          <th><center>Action</center></th>
        </thead>
        <tbody>
          <?php $users = getUsers() ?>
          <?php while ($row = mysqli_fetch_array($users)) { ?>
            <tr>
              <td width="20%"><?php echo $row['fname']; ?> <?php echo $row['mi']; ?> <?php echo $row['lname']; ?></td>
              <td width="30%"><?php echo $row['address']; ?></td>
              <td width="12%"><?php echo $row['contactNo']; ?></td>
              <td width="15%"><?php echo $row['email']; ?></td>
              <td width="3%"><?php echo $row['gender']; ?></td>
              <td width="10%">
                <a class="del_btn btn btn-primary btn-sm" href="../manage-patients/server.php?edit=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a>
                <button type="button" class="btn btn-danger btn-sm" onclick="deletePatient(<?php echo $row['id'] ?>)"><i class="fa fa-trash"></i></button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
<!-- Bootstrap core JavaScript-->
<!-- Custom scripts for this page-->
<script src="<?php echo getBaseUrl() ?>/vendor/jquery/jquery.min.js"></script>
<!-- Page level plugin CSS-->
<link href="<?php echo getBaseUrl() ?>/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
<!-- SCRIPTS -->
<script src="<?php echo getBaseUrl() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo getBaseUrl() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="<?php echo getBaseUrl() ?>/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo getBaseUrl() ?>/vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="<?php echo getBaseUrl() ?>/assets/js/sb-admin.min.js"></script>
<script type="text/javascript">
  $(function(){
    $("#dataTable1").DataTable();
  })
  function deletePatient(idx) {
    let url = "<?php echo getBaseUrl() ?>/api/getPatientInfoDelete.php";
    // $(".modal-message").html('<span class="fa fa-spinner fa-spin"></span> Loading patient info...');
    $.post(url, {id: idx}, function (result) {
      $("#deleteModalpatient").html(result);
      $("#deleteModalpatient").modal('show');
    });
  }
</script>
