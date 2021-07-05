<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: http://lrgs.ftsm.ukm.my/users/a163388/wecare/login/login.php");
exit;
?>
