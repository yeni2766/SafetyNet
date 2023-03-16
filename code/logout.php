<?php


// Unset all of the session variables
session_start();
// Destroy username.

unset($_SESSION["pin"]);
// Redirect to login page
header("location:chatapp/safetynetloginparents.php");
exit;
?>