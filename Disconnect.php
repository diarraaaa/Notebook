<?php
session_start();  // Start the session

// Clear all session variables
session_unset();  

// Destroy the session
session_destroy();  

// Redirect to the login page or home page
header("Location: Connexion.php");  
exit();  // Ensure no further code is executed
?>