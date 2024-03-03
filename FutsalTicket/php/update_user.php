<?php
// Include the database connection file
require_once('../include/connection.php');

// Retrieve the submitted form data
$user_id = $_POST['user_id']; // Update the variable name to user_id
$full_name = $_POST['full_name'];
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
// Add more fields as needed

// Perform server-side validation
if (empty($full_name) || empty($username) || empty($email) || empty($phone)) {
  // Required fields are missing
  header("Location: edit_user.php?error=Please fill in all the fields.");
  exit();
}

// Update user information in the database
$query = "UPDATE users SET username = '$username', full_name = '$full_name', email = '$email', phone = '$phone' WHERE id = $user_id";
$result = mysqli_query($conn, $query);

if ($result) {
  // User information updated successfully
  header("Location: manage_users.php");
  exit();
} else {
  // Failed to update user information
  header("Location: edit_user.php?error=Failed to update user information.");
  exit();
}
?>
