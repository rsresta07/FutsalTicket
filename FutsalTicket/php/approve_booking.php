<?php
// Include the database connection file
include '../include/connection.php';

// Check if the booking ID is provided
if (isset($_GET['id'])) {
  $bookingId = $_GET['id'];

  // Perform the database update to approve the booking
  $query = "UPDATE bookings SET status = 'Approved' WHERE booking_id = $bookingId";
  if (mysqli_query($conn, $query)) {
    // Approval successful
    header('location:manage_booking.php');
  } else {
    // Error occurred during approval
    echo "Error approving booking: " . mysqli_error($conn);
  }
} else {
  // Booking ID is not provided
  echo "Invalid request. Booking ID is missing.";
}

// Close the database connection
mysqli_close($conn);
?>
