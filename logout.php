<?php
session_start();
require("templates/initialization.php");
session_destroy();
header("Location: ". getBaseUrl() . "/");
die();
?>
