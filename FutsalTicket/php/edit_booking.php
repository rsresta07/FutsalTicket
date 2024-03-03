<?php
// Include the database connection file
include '../include/connection.php';

// Check if the user is logged in as admin (you can modify this based on your authentication mechanism)
session_start();
// if (!isset($_SESSION['admin'])) {
//   // Redirect to the admin login page if not logged in
//   header("Location: login.php");
//   exit();
// }

// Check if the booking ID is provided in the URL
if (!isset($_GET['id'])) {
  // Redirect to the manage_booking.php page if booking ID is not provided
  header("Location: manage_booking.php");
  exit();
}

// Retrieve the booking ID from the URL
$bookingId = $_GET['id'];

// Retrieve the booking information from the database
$query = "SELECT * FROM bookings WHERE booking_id = $bookingId";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
  // Booking found, fetch the booking data
  $booking = mysqli_fetch_assoc($result);
} else {
  // Booking not found, redirect to the manage_booking.php page
  header("Location: manage_booking.php");
  exit();
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Retrieve the updated form data
  $bookingDate = $_POST['booking_date'];
  $bookingTime = $_POST['booking_time'];
  $status = $_POST['status'];

  // Perform server-side validation if required

  // Update the booking in the database
  $updateQuery = "UPDATE bookings SET booking_date = '$bookingDate', booking_time = '$bookingTime', status = '$status' WHERE booking_id = $bookingId";

  if (mysqli_query($conn, $updateQuery)) {
    // Booking updated successfully, redirect to the manage_booking.php page
    header("Location: manage_booking.php");
    exit();
  } else {
    // Error occurred during the update, handle it as desired
    echo "Error updating booking: " . mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Booking</title>
  <link rel="stylesheet" type="text/css" href="../css/allstyles.css">
  <link rel="stylesheet" type="text/css" href="../css/navstyles.css">
  <link rel="stylesheet" type="text/css" href="../css/footerstyles.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    h1 {
      text-align: center;
    }

    form {
      width: 50%;
      margin: 0 auto;
    }

    label {
      display: block;
      margin-top: 10px;
    }

    input[type="text"] {
      width: 50%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    label {
      font-weight: bold;
    }

    /* Styling for select dropdown */
    select {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
      width: 50%;
      box-sizing: border-box;
    }

    /* Styling for date input */
    input[type="date"] {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
      width: 50%;
      box-sizing: border-box;
    }

    /* Styling for time input */
    input[type="time"] {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
      width: 50%;
      box-sizing: border-box;
    }

  </style>
</head>
<body>
  <header>
    <nav>
        <ul>
        <li><a href="admin_dashboard.php">Dashboard</a></li>
        <li><a href="manage_bookings.php">Manage Bookings</a></li>
        <li><a href="manage_users.php">Manage Users</a></li>
        <!-- Add more menu options as needed -->
        </ul>
    </nav>
    </header>
  <br>
  <h1>Edit Booking</h1>

  <form action="" method="post">
    <label for="booking_date">Booking Date:</label>
    <input type="date" id="booking_date" name="booking_date" value="<?php echo $booking['booking_date']; ?>" required><br>

    <label for="booking_time">Booking Time:</label>
    <input type="time" id="booking_time" name="booking_time" value="<?php echo $booking['booking_time']; ?>" required><br>

    <label for="status">Status:</label>
    <select id="status" name="status" required>
      <option value="Pending" <?php if ($booking['status'] == 'pending') echo 'selected'; ?>>Pending</option>
      <option value="Approved" <?php if ($booking['status'] == 'approved') echo 'selected'; ?>>Approved</option>
      <option value="Rejected" <?php if ($booking['status'] == 'rejected') echo 'selected'; ?>>Rejected</option>
    </select><br><br>

    <input type="submit" value="Update">
  </form><br>
</body>
</html>
