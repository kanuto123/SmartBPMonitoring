<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-user"></i> Add User
  </div>
  <div class="card-body">
    <div class="alert alert-success dynamic-alert" role="alert" style="display: none;"><center class="error-messages"></center></div>
    <div class="table-responsives">
      <form>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <label for="InputFname"><strong>First name</strong></label>
              <input class="form-control" id="fname" type="text"  placeholder="Enter first name">
              <span style="color: red;" id="fname_error"></span>
            </div>
            <div class="col-md-6">
              <label for="InputLname"><strong>Last name</strong></label>
              <input class="form-control" id="lname" type="text"  placeholder="Enter last name">
              <span style="color: red;" id="lname_error"></span>
            </div>
            <div class="col-md-6">
              <label for="InputMi"><strong>Middle Initial</strong></label>
              <input class="form-control" id="mi" type="text"  placeholder="Enter middle inital">
              <span style="color: red;" id="mi_error"></span> 
            </div>
            <div class="col-md-6">
              <label for="InputAddress"><strong>Address</strong></label>
              <input class="form-control" id="address" type="text"  placeholder="Enter address">
              <span style="color: red;" id="address_error"></span>
            </div>
            <div class="col-md-6">
              <label for="InputContactNo"><strong>Contact Number</strong></label>
              <input class="form-control" id="contactNo" type="text"  placeholder="Enter contact number">
              <span style="color: red;" id="contactNo_error"></span>
            </div>
            <div class="col-md-6">
              <label for="InputBirthday"><strong>Birth Date</strong></label>
              <input class="form-control" id="birthday" type="date"  placeholder="Enter birth date ">
              <span style="color: red;" id="birthday_error"></span>
            </div>
            <div class="col-md-6">
              <label for="InputEmailAddress"><strong>Email address</strong></label>
              <input class="form-control" id="email" type="email"  placeholder="Enter email">
              <span style="color: red;" id="email_error"></span>
            </div>
            <div class="col-md-6">
                <label for="InputGender"><strong>Gender</strong></label>
                <br>
                <input type="radio" id="gender" value="male"> Male
                <input type="radio" id="gender" value="female"> Female
                <br>
            <span style="color: red;" id="gender_error"></span>
            </div>
            <div class="col-md-6">
            <label for="InputPassword"><strong>Password</strong></label>
            <input class="form-control" id="password" type="password"  placeholder="Enter password">
            <span style="color: red;" id="password_error"></span>
          </div>
          <div class="col-md-6">
            <label for="InputPassword"><strong>Confirm Password</strong></label>
            <input class="form-control" id="password" type="password"  placeholder="Confirm password">
            <span style="color: red;" id="password_error"></span>
          </div>
          </div>
          <br>
          <button type="button" class="btn btn-primary btn-sm" onclick="addUserDB()">Add User</button>
        </div>
      </form>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
</div>
<script type="text/javascript">
  function addUserDB () {
    let url = "<?php echo getBaseUrl() ?>/api/addUser.php";
    let params = {
      fname: $("#fname").val(),
      lname: $("#lname").val(),
      mi: $("#mi").val(),
      address: $("#address").val(),
      contactNo: $("#contactNo").val(),
      birthday: $("#birthday").val(),
      email: $("#email").val(),
      gender: $("#gender:checked").val()
      email: $("#password").val(),
    }

    $.post(url, params, function (o) {
      if(o.is_successful) {
        $(".dynamic-alert").show();
        clearFields();
        $(".dynamic-alert").removeClass('alert-success'); 
        $(".dynamic-alert").removeClass('alert-danger');
        $(".dynamic-alert").addClass('alert-success');
        $(".error-messages").html(o.messages);
      } else {
        $(".dynamic-alert").removeClass('alert-success'); 
        $(".dynamic-alert").removeClass('alert-danger');
        $(".dynamic-alert").addClass('alert-danger');
        // $(".error-messages").html(o.errors);
        // clear messages
        let fields = ['fname', 'lname', 'mi', 'address', 'contactNo', 'birthday', 'email', 'gender', 'password'];
        $.each(fields, function( index, value ) {
          $("#"+value+"_error").html("");
        });
        // set messages
        $.each(o.errors, function( index, value ) {
          $("#"+index+"_error").html(value);
        });
        $(".dynamic-alert").hide();
      }
    }, 'json');
  }

  function clearFields () {
    $("#fname").val("");
    $("#lname").val("");
    $("#mi").val("");
    $("#address").val("");
    $("#contactNo").val("");
    $("#birthday").val("");
    $("#email").val("");
    $("#gender").val("");
  }
</script>

