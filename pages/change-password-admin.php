<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-key"></i> Change Password
  </div>
  <div class="card-body">
    <div class="table-responsives">
      <?php if(isset($_SESSION['errormsg'])): ?>
        <div class="errormsg">
          <?php
            echo $_SESSION['errormsg'];
            $email = $_SESSION['email'];
            unset($_SESSION['errormsg']);
            $_SESSION['email'] = $email;
          ?>
        </div>
      <?php endif ?><br>
    <form method="POST" action="<?php echo getBaseUrl() ?>/user-profile/server.php">
      <?php
        if (isset($_SESSION['email'])){
            $email = $_SESSION['email'];
            $user = getUserProfile();
            while ($row = mysqli_fetch_array($user)) {
      ?>
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <div class="form-group">
        <div class="form-row">
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
        <button type="submit" name="updateAdmin" class="btn btn-primary">Edit</button>
      </div>
      <?php }} ?>
    </form>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
<!-- SCRIPTS -->
