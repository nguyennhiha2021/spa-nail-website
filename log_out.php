<?php
    session_start();
    session_unset(); // Clear all session variables
    session_destroy(); // Destroy the session
    header("location: log_in.php"); // Redirect to the log-in page
    exit();
?>
