<?php
// Include the database connection file
include '/include/connection.php';

// Check if the user is logged in (you can modify this based on your authentication mechanism)
if (isset($_SESSION['user_id'])) {
  $userId = $_SESSION['user_id'];

  // Retrieve approved bookings for the user from the database
  $query = "SELECT * FROM bookings WHERE user_id = $userId AND status = 'approved'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    // Loop through the bookings and display or use the data as desired
    while ($booking = mysqli_fetch_assoc($result)) {
      echo "Booking ID: " . $booking['id'] . "<br>";
      echo "Field: " . $booking['field'] . "<br>";
      echo "Date: " . $booking['date'] . "<br>";
      echo "Time: " . $booking['time'] . "<br>";
      // Display other booking information as needed
      echo "<br>";
    }
  } else {
    // No approved bookings found for the user
    echo "No approved bookings found";
  }

  // Close the database connection
  mysqli_close($conn);
} else {
  // User is not logged in
  echo "User not logged in";
}
?>
