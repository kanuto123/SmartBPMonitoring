<?php
session_start();
require('../templates/initialization.php');

$con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
}
$post = $_POST;
if (!$post['id']) {
  $error = "Failed loading patient info.";
  echo $error;
  die();
}
$id = $post['id'];
// Perform queries
$query = "SELECT * FROM patient WHERE id='$id'";

$res = mysqli_query($con,$query);
$patient = mysqli_fetch_assoc($res);
mysqli_close($con);
?>

<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="deleteModalLabelpatient">Delete Patient?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body modal-message">
      Do you wish to delete patient: <?php echo $patient['fname'] ?> <?php echo $patient['lname'] ?>?
    </div>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      <button class="btn btn-danger" type="button" onclick="deletePatientDB(<?php echo $patient['id'] ?>)">Delete</button>
    </div>
  </div>
</div>
<script type="text/javascript">
  function deletePatientDB (id) {
    let url = "<?php echo getBaseUrl() ?>/api/deletePatient.php";
    $.post(url, {id: id}, function (o) {
      $(".dynamic-alert").show();
      if(o.is_successful) {
        $(".dynamic-alert").removeClass('alert-success'); 
        $(".dynamic-alert").removeClass('alert-danger');
        $(".dynamic-alert").addClass('alert-success');
        $(".error-messages").html(o.message);
      } else {
        $(".dynamic-alert").removeClass('alert-success'); 
        $(".dynamic-alert").removeClass('alert-danger');
        $(".dynamic-alert").addClass('alert-danger');
        $(".error-messages").html(o.error);
      }
      $("#deleteModalpatient").modal('hide');
    }, 'json');
  }
</script>