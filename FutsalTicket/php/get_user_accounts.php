<?php
// Include the database connection file
include '../include/connection.php';

// Retrieve user account data from the database
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
  // Loop through each user account
  while ($user = mysqli_fetch_assoc($result)) {
    // Fetch additional details like booking history for each user
    // ... (You can modify the query and fetch additional details as needed)

    // Display user account details in a table row
    echo '<tr>';
    echo '<td>' . $user['id'] . '</td>';
    echo '<td>' . $user['username'] . '</td>';
    echo '<td>' . $user['full_name'] . '</td>';
    echo '<td>' . $user['email'] . '</td>';
    echo '<td>' . $user['phone'] . '</td>';
    echo '<td><a href="edit_user.php?id=' . $user['id'] . '" class="user-action-link">Edit</a> | <a href="delete_user.php?id=' . $user['id'] . '" class="user-action-link">Delete</a></td>';
    echo '</tr>';
  }
} else {
  echo '<tr><td colspan="4">No user accounts found.</td></tr>';
}
?>
