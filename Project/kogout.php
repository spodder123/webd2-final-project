<?php
session_start();
require("authentication.php");


// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

// Redirect the user to the login page
header("Location: login.php");
exit;
?>
