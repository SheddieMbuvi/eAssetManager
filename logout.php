<?php
// Start the session (if not already started)
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: index.php"); // Change to login page
exit();
?>