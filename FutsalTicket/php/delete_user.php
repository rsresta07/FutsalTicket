<?php
// Include the database connection file
include '../include/connection.php';

// Retrieve the user ID from the URL parameter
$userId = $_GET['id'];

// Delete the user account from the database
$query = "DELETE FROM users WHERE id = $userId";
if (mysqli_query($conn, $query)) {
  echo 'User account deleted successfully.';
} else {
  echo 'Error deleting user account: ' . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
