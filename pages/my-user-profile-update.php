<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-user"></i> Update My Profile
  </div>
  <div class="card-body">
      <?php if(isset($_SESSION['errormsg'])): ?>
        <div class="error msg">
          <?php
            echo $_SESSION['errormsg'];
            unset($_SESSION['errormsg']);
          ?>
        </div>
      <?php endif ?><br>
    <div class="table-responsives">
    <form method="POST" action="<?php echo getBaseUrl() ?>/user-profile/server.php">
      <?php
        if (isset($_SESSION['email'])){
            $email = $_SESSION['email'];
            $user = getUserProfile();
            while ($row = mysqli_fetch_array($user)) {
      ?>
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <input type="hidden" name="patient_id" value="<?php echo $row['patient_id']; ?>">
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-6">
            <label for="InputFname"><strong>First Name</strong></label>
            <input class="form-control" name="fname" type="text" value="<?php echo $row['fname']; ?>"> 
          </div>
          <div class="col-md-6">
            <label for="InputLname"><strong>Last Name</strong></label>
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
            <input class="form-control" name="birthday" type="date" value="<?php echo $row['birthday']; ?>" disabled>
          </div>
          <div class="col-md-6">
            <label for="InputEmailAddress"><strong>Email address</strong></label>
            <input class="form-control" name="email" type="email" value="<?php echo $row['email']; ?>" disabled>
          </div>
          <div class="col-md-6">
            <label for="InputGender"><strong>Gender</strong></label>
            <input class="form-control" name="gender" type="text" value="<?php echo $row['gender']; ?>" disabled>
          </div>
          <div class="col-md-6">
            <label for="InputPassword"><strong>Password</strong></label>
            <input class="form-control" name="password" id="password" type="password"  placeholder="Enter new password">
            <span style="color: red;" id="password_error"></span>
          </div>
          <div class="col-md-6">
            <label for="InputPassword"><strong>Confirm Password</strong></label>
            <input class="form-control" name="password2" id="password2" type="password"  placeholder="Confirm new password">
            <span style="color: red;" id="password2_error"></span>
          </div>
        </div>
        <br>
        <button type="submit" name="update" class="btn btn-primary">Edit</button>
      </div>
      <?php }} ?>
    </form>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>