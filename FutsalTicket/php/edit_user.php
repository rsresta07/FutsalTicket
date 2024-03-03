<html>
<head>
  <link rel="stylesheet" type="text/css" href="../css/allstyles.css">
  <link rel="stylesheet" href="../css/edit_user.css">
</head>
<body>
<?php
// Include the database connection file
include '../include/connection.php';

// Retrieve the user ID from the URL parameter
$userId = $_GET['id'];

// Retrieve the user account data from the database based on the ID
$query = "SELECT * FROM users WHERE id = $userId";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
  $user = mysqli_fetch_assoc($result);
  echo '<div class="container">';
  // Display the user account edit form
  echo '<h1>Edit User Account</h1>';
  echo '<form action="update_user.php" method="POST">';
  echo 'Username: <input type="text" name="username" placeholder="" value="' . $user['username'] . '"><br>';
  echo 'Name: <input type="text" name="full_name" value="' . $user['full_name'] . '"><br>';
  echo 'Email: <input type="email" name="email" value="' . $user['email'] . '"><br>';
  echo 'Phone Number: <input type="text" name="phone" value="' . $user['phone'] . '"><br>';
  // Add more fields as needed
  echo '<input type="hidden" name="user_id" value="' . $user['id'] . '">';
  echo '<center><input type="submit" value="Update"></center>';
  echo '</form>';
  echo '</div>';
} else {
  echo 'User account not found.';
}

// Close the database connection
mysqli_close($conn);
?>
</body>
</html>
