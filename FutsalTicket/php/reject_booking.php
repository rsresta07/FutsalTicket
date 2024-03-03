<?php
// Include the database connection file
include '../include/connection.php';

// Check if the booking ID is provided
if (isset($_GET['id'])) {
  $bookingId = $_GET['id'];

  // Retrieve the booking details from the database
  $query = "SELECT * FROM bookings WHERE booking_id = $bookingId";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) === 1) {
    // Fetch the booking data
    $booking = mysqli_fetch_assoc($result);

    // Update the booking status to "Rejected"
    $updateQuery = "UPDATE bookings SET status = 'Rejected' WHERE booking_id = $bookingId";
    mysqli_query($conn, $updateQuery);

    // Redirect back to the manage_booking.php page with success message
    header("Location: manage_booking.php?success=Booking rejected successfully");
    exit();
  } else {
    // Booking not found in the database
    header("Location: manage_booking.php?error=Booking not found");
    exit();
  }
} else {
  // Booking ID is not provided
  header("Location: manage_booking.php?error=Invalid booking ID");
  exit();
}
?>
