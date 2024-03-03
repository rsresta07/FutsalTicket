<?php
// Include the database connection file
include '../include/connection.php';

// Check if the user is logged in (you can modify this based on your authentication mechanism)
if (isset($_SESSION['user_id'])) {
  $userId = $_SESSION['user_id'];

  // Retrieve user information from the database
  $query = "SELECT * FROM users WHERE id = $userId";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    // Fetch user data
    $user = mysqli_fetch_assoc($result);

    // Print or use the user information as desired
    echo "User ID: " . $user['id'] . "<br>";
    echo "Username: " . $user['username'] . "<br>";
    echo "Email: " . $user['email'] . "<br>";
    // Display other user information as needed
  } else {
    // User not found in the database
    echo "User not found";
  }

  // Close the database connection
  mysqli_close($conn);
} else {
  // User is not logged in
  echo "User not logged in";
}
?>
