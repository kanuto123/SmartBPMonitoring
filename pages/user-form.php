<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-user"></i> Add User
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
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <label for="InputFname"><strong>First name</strong></label>
              <input class="form-control" name="fname" type="text"  placeholder="Enter first name">
              <span style="color: red;"><?php echo (isset($_SESSION['errors']['fname']) ? $_SESSION['errors']['fname'] : "") ?></span>
            </div>
            <div class="col-md-6">
              <label for="InputLname"><strong>Last name</strong></label>
              <input class="form-control" name="lname" type="text"  placeholder="Enter last name">
              <span style="color: red;"><?php echo (isset($_SESSION['errors']['lname']) ? $_SESSION['errors']['lname'] : "") ?></span>
            </div>
            <div class="col-md-6">
              <label for="InputMi"><strong>Middle Initial</strong></label>
              <input class="form-control" name="mi" type="text"  placeholder="Enter middle inital">
              <span style="color: red;"><?php echo (isset($_SESSION['errors']['mi']) ? $_SESSION['errors']['mi'] : "") ?></span>
                                                    <!-- question ? true=print errors false=empty -->  
            </div>
            <div class="col-md-6">
              <label for="InputAddress"><strong>Address</strong></label>
              <input class="form-control" name="address" type="text"  placeholder="Enter address">
              <span style="color: red;"><?php echo (isset($_SESSION['errors']['address']) ? $_SESSION['errors']['address'] : "") ?></span>
            </div>
            <div class="col-md-6">
              <label for="InputContactNo"><strong>Contact Number</strong></label>
              <input class="form-control" name="contactNo" type="text"  placeholder="Enter contact number">
              <span style="color: red;"><?php echo (isset($_SESSION['errors']['contactno']) ? $_SESSION['errors']['contactno'] : "") ?></span>
            </div>
            <div class="col-md-6">
              <label for="InputBirthday"><strong>Birth Date</strong></label>
              <input class="form-control" name="birthday" type="date"  placeholder="Enter birth date ">
              <span style="color: red;"><?php echo (isset($_SESSION['errors']['bday']) ? $_SESSION['errors']['bday'] : "") ?></span>
            </div>
            <div class="col-md-6">
              <label for="InputEmailAddress"><strong>Email address</strong></label>
              <input class="form-control" name="email" type="email"  placeholder="Enter email">
              <span style="color: red;"><?php echo (isset($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : "") ?></span>
            </div>
            <div class="col-md-6">
                <label for="InputGender"><strong>Gender</strong></label>
                <br>
                <input type="radio" name="gender" value="male"> Male
                <input type="radio" name="gender" value="female"> Female
                <br>
            <span style="color: red;"><?php echo (isset($_SESSION['errors']['gender']) ? $_SESSION['errors']['gender'] : "") ?></span>
            </div>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Add Patient</button>
        </div>
      </form>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
</div>
<!-- SCRIPTS -->
