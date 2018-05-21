<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-user"></i> Update User
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
    <form method="POST" action="<?php echo getBaseUrl() ?>/manage-user/server.php">
      <?php
        if (isset($_GET['edit']) && isset($_GET['editPid'])){
          $id = $_GET['edit'];
          $patient_id = $_GET['editPid'];
          $users = updateUser();
          $row = mysqli_fetch_array($users);
        }
      ?>
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <input type="hidden" name="patient_id" value="<?php echo $row['patient_id']; ?>">
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-6">
            <label for="InputFname"><strong>First name</strong></label>
            <input class="form-control" name="fname" type="text" value="<?php echo $row['fname']; ?>">
          </div>
          <div class="col-md-6">
            <label for="InputLname"><strong>Last name</strong></label>
            <input class="form-control" name="lname" type="text" value="<?php echo $row['lname']; ?>">
          </div>
          <div class="col-md-6">
            <label for="InputMi"><strong>Middle Initial</strong></label>
            <input class="form-control" name="mi" type="text" value="<?php echo $row['mi']; ?>">                   
          </div>                      
          <div class="col-md-6">
            <label for="InputAddress"><strong>Address</strong></label>
            <input class="form-control" name="address" type="text" value="<?php echo $row['address']; ?>">
          </div>
          <div class="col-md-6">
            <label for="InputContactNo"><strong>Contact Number</strong></label>
            <input class="form-control" name="contactNo" type="text" value="<?php echo $row['contactNo']; ?>">
          </div>
          <div class="col-md-6">
            <label for="InputBirthday"><strong>Birth Date</strong></label>
            <input class="form-control" name="bday" type="date" value="<?php echo $row['birthday']; ?>">
          </div>
          <div class="col-md-6">
            <label for="InputEmailAddress"><strong>Email address</strong></label>
            <input class="form-control" name="email" type="email" value="<?php echo $row['email']; ?>">
          </div>
          <div class="col-md-6">
            <label for="InputGender"><strong>Gender</strong></label>
            <br>
            <?php if($row['gender'] == "Male"){ ?>
            <input type="radio" name="gender" value="Male" checked="checked"> Male
            <input type="radio" name="gender" value="Female"> Female
            <?php } else if($row['gender'] == "Female"){ ?>
            <input type="radio" name="gender" value="Male"> Male
            <input type="radio" name="gender" value="Female" checked="checked"> Female
            <?php } ?>
            <br>
          </div>
        </div>
        <br>
        <button type="submit" name="update" class="btn btn-primary">Update User</button>
      </div>
    </form>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>