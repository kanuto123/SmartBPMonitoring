<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-user"></i> My Profile
  </div>
  <div class="card-body">
    <br>
    <div class="table-responsives">
    <form method="POST" action="<?php echo getBaseUrl() ?>/user-profie/server.php">
      <?php
        if (isset($_GET['edit'])){
          $id = $_GET['edit'];
          $patient = updatePatient();
          $row = mysqli_fetch_array($patient);
        }
      ?>
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <input type="hidden" name="patient_id" value="<?php echo $row['patient_id']; ?>">
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-6">
            <label for="InputFname"><strong>First Name</strong></label>
            <input class="form-control" name="fname" type="text" disabled value="<?php echo $row['fname']; ?>"> 
          </div>
          <div class="col-md-6">
            <label for="InputLname"><strong>Last Name</strong></label>
            <input class="form-control" name="lname" type="text" disabled>
          </div>
          <div class="col-md-6">
            <label for="InputMi"><strong>Middle Initial</strong></label>
            <input class="form-control" name="mi" type="text" disabled>                 
          </div>                      
          <div class="col-md-6">
            <label for="InputAddress"><strong>Address</strong></label>
            <input class="form-control" name="address" type="text" disabled>
          </div>
          <div class="col-md-6">
            <label for="InputContactNo"><strong>Contact Number</strong></label>
            <input class="form-control" name="contactNo" type="text" disabled>
          </div>
          <div class="col-md-6">
            <label for="InputBirthday"><strong>Birth Date</strong></label>
            <input class="form-control" name="birthday" type="date" disabled>
          </div>
          <div class="col-md-6">
            <label for="InputEmailAddress"><strong>Email address</strong></label>
            <input class="form-control" name="email" type="email" disabled>
          </div>
          <div class="col-md-6">
            <label for="InputGender"><strong>Gender</strong></label>
            <input class="form-control" name="gender" type="text" disabled>
          </div>
        </div>
        <br>
        <button type="submit" name="update" class="btn btn-primary">Edit</button>
      </div>
    </form>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
<!-- SCRIPTS -->
