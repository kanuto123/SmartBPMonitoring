<div class="card mb-3">
  <div class="card-header">
    <div class="row">
      <div class="col-sm-6">
        <i class="fa fa-group"></i> Manage Patient Records</i>
      </div>
      <div class="col-sm-6">
        <a href="<?php echo getBaseUrl() ?>/manage-patients/add.php" class="btn btn-success btn-sm pull-right">
          <i class="fa fa-plus"></i> ADD NEW PATIENT
        </a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Username</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
            <th></th>
          </tr>
        </thead>
           <tr>
            <td align="left">Dexter</td>
            <td>Support Lead</td>
            <td>Edinburgh</td>
            <td>22</td>
            <td>2013/03/03</td>
            <td>$342,000</td>
            <td>
              <button type="button" name="edit" style="margin-top:5px;" class="btn btn-info btn-sm">Edit</button>
              <button type="button" name="delete" style="margin-top:5px;" class="btn btn-info btn-sm">Delete</button>
          </td>
          </tr>
           <tr>
            <td align="left">Kenneth</td>
            <td>Support Lead</td>
            <td>Edinburgh</td>
            <td>22</td>
            <td>2013/03/03</td>
            <td>$342,000</td>
            <td>
              <button type="button" name="edit" style="margin-top:5px;" class="btn btn-info btn-sm">Edit</button>
              <button type="button" name="delete" style="margin-top:5px;" class="btn btn-info btn-sm">Delete</button>
          </td>
          </tr>
        <tbody>
           <tr>
            <td align="left">Richievelle</td>
            <td>Support Lead</td>
            <td>Edinburgh</td>
            <td>22</td>
            <td>2013/03/03</td>
            <td>$342,000</td>
            <td>
              <button type="button" name="edit" style="margin-top:5px;" class="btn btn-info btn-sm">Edit</button>
              <button type="button" name="delete" style="margin-top:5px;" class="btn btn-info btn-sm">Delete</button>
          </td>
          </tr>
            <tr>
            <td align="left">Abegail</td>
            <td>Support Lead</td>
            <td>Edinburgh</td>
            <td>22</td>
            <td>2013/03/03</td>
            <td>$342,000</td>
            <td>
              <button type="button" name="edit" style="margin-top:5px;" class="btn btn-info btn-sm">Edit</button>
              <button type="button" name="delete" style="margin-top:5px;" class="btn btn-info btn-sm">Delete</button>
          </td>
          </tr>

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
