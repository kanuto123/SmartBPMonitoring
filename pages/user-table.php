<div class="card mb-3">
  <div class="card-header">
    <div class="row">
      <div class="col-sm-6">
        <i class="fa fa-group"></i> Manage User Records</i>
      </div>
      <div class="col-sm-6">
        <a href="<?php echo getBaseUrl() ?>/manage-user/add.php" class="btn btn-outline-success btn-sm pull-right">
          <i class="fa fa-plus"></i> ADD NEW USER
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
       <!--  <?php if (isset($_SESSION['msg3'])) { ?>
            <div class="alert alert-success" role="alert">
            <center><?php echo $_SESSION['msg3'] ?></center>
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
            <th><center>Action</center></th>
            </div>
          </tr>
        </thead>
        <tbody>
          <?php $results = getUserWithPatient() ?>
          <?php while ($row = mysqli_fetch_assoc($results)) { ?>
          <tr>
            <td><?php echo $row['fullname']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['contactNo']; ?></td>
            <td><?php echo $row['birthday']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td>
            <button type="submit" class="btn btn-primary btn-sm">Edit</button>
            <button type="button" class="btn btn-primary btn-sm" onclick="deleteUser(<?php echo $row['id'] ?>)">Delete</button>
            <!-- <a class="del_btn" href="../manage-user/server.php?del=<?php echo $row['id']; ?>"> <button class=“btn btn-primary btn-sm”>Delete</button></a> -->
            </td>
          </tr>
          <?php } ?>
          <?php $results1 = getUserStaffs() ?>
          <?php while ($row1 = mysqli_fetch_assoc($results1)) { ?>
          <tr>
            <td><?php echo $row1['fullname']; ?></td>
            <td><?php echo $row1['address']; ?></td>
            <td><?php echo $row1['contactNo']; ?></td>
            <td><?php echo $row1['birthday']; ?></td>
            <td><?php echo $row1['email']; ?></td>
            <td><?php echo $row1['gender']; ?></td>
            <td>
            <button type="submit" class="btn btn-primary btn-sm">Edit</button>
             <button type="button" class="btn btn-primary btn-sm" onclick="deleteUser(<?php echo $row1['id'] ?>)">Delete</button>
            <!-- <a class="del_btn" href="../manage-user/server.php?del=<?php echo $row['id']; ?>"> <button class=“btn btn-primary btn-sm”>Delete</button></a> -->
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
  function deleteUser(idx) {
    let url = "<?php echo getBaseUrl() ?>/api/getUserInfoDelete.php";
    // $(".modal-message").html('<span class="fa fa-spinner fa-spin"></span> Loading patient info...');
    $.post(url, {id: idx}, function (result) {
      $("#deleteModaluser").html(result);
      $("#deleteModaluser").modal('show');
    });
  }
</script>