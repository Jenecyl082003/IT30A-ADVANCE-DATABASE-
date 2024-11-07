<?php
// sample/databases/logout.php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: ../../index.php"); // Redirect to the login page (adjust the path as needed)
exit;
?>
