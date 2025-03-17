<?php
session_start(); // Start the session
session_destroy(); // Destroy the session
header("Location: home.php"); // Redirect to home page
exit();
?>