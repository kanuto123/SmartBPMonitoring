<?php
// database query and calls

$session = $_SESSION;
if (!$session['user']) {
  header('Location: '.getBaseUrl().'/login.php');
  die();
}
?>
