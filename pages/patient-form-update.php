<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-user"></i> Add Patient
  </div>
  <div class="card-body">
    <?php if (isset($_SESSION['msg'])): ?>
      <div class="msg">
        <?php 
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
        ?>
      </div>
    <?php endif ?>
    <br>
    <div class="table-responsives">
    <form method="POST" action="<?php echo getBaseUrl() ?>/manage-patients/server.php">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-6">
            <label for="InputFname"><strong>First name</strong></label>
            <input class="form-control" name="fname" type="text"  placeholder="Enter first name">
          </div>
          <div class="col-md-6">
            <label for="InputLname"><strong>Last name</strong></label>
            <input class="form-control" name="lname" type="text"  placeholder="Enter last name">
          </div>
          <div class="col-md-6">
            <label for="InputMi"><strong>Middle Initial</strong></label>
            <input class="form-control" name="mi" type="text"  placeholder="Enter middle inital">                   
          </div>                      
          <div class="col-md-6">
            <label for="InputAddress"><strong>Address</strong></label>
            <input class="form-control" name="address" type="text"  placeholder="Enter address">
          </div>
          <div class="col-md-6">
            <label for="InputContactNo"><strong>Contact Number</strong></label>
            <input class="form-control" name="contactno" type="text"  placeholder="Enter contact number">
          </div>
          <div class="col-md-6">
            <label for="InputBirthday"><strong>Birth Date</strong></label>
            <input class="form-control" name="bday" type="date"  placeholder="Enter birth date">
          </div>
          <div class="col-md-6">
            <label for="InputEmailAddress"><strong>Email address</strong></label>
            <input class="form-control" name="email" type="email"  placeholder="Enter email">
          </div>
          <div class="col-md-6">
            <label for="InputGender"><strong>Gender</strong></label>
            <br>
            <input type="radio" name="gender" value="male"> Male
            <input type="radio" name="gender" value="female"> Female
            <br>
          </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Add Patient</button>
      </div>
      <?php if ($edit_state==false):?> 
      <button type="submit" name="save" class="btn">Save</button>
    <?php else:  ?>
      <button type="submit" name="update" class="btn">Update</button>
    <?php endif ?>
    </form>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
<!-- SCRIPTS -->
