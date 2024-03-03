<?php
// Start or resume the session
session_start();

// Destroy all session data
session_destroy();

// Redirect the user to the homepage or any other desired page
header("Location: ../index.php");
exit();
?>
