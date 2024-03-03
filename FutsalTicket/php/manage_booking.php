<?php
// Include the database connection file
include '../include/connection.php';

// Function to get field name based on field ID
function getFieldName($conn, $fieldId) {
  $query = "SELECT field_name FROM tbl_field WHERE field_id = $fieldId";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    return $row['field_name'];
  } else {
    return "Unknown Field";
  }
}

session_start();
// Sorting and filtering
$sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'booking_date'; // Change default to 'booking_date'
$sortOrder = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
$filterStatus = isset($_GET['status']) ? $_GET['status'] : '';

// Retrieve bookings from the database
$today = date('Y-m-d');
if ($filterStatus == 'past') {
  $query = "SELECT bookings.*, tbl_field.field_name
            FROM bookings
            INNER JOIN tbl_field ON bookings.field_id = tbl_field.field_id
            WHERE booking_date < '$today'
            ORDER BY $sortColumn $sortOrder";
} else {
  $query = "SELECT bookings.*, tbl_field.field_name
            FROM bookings
            INNER JOIN tbl_field ON bookings.field_id = tbl_field.field_id
            WHERE booking_date >= '$today' AND status LIKE '%$filterStatus%'
            ORDER BY $sortColumn $sortOrder";
}
$result = mysqli_query($conn, $query);

// Function to update booking status
function updateBookingStatus($conn, $bookingId, $status) {
  $query = "UPDATE bookings SET status = '$status' WHERE booking_id = $bookingId";
  return mysqli_query($conn, $query);
}

// Function to delete a booking
function deleteBooking($conn, $bookingId) {
  $query = "DELETE FROM bookings WHERE booking_id = $bookingId";
  return mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../css/allstyles.css">
  <link rel="stylesheet" type="text/css" href="../css/navstyles.css">
  <link rel="stylesheet" type="text/css" href="../css/footerstyles.css">
  <title>Manage Bookings</title>
  <style>
    h1 {
      text-align: center;
    }

    .main-content {
      color: rgb(194, 194, 194);
      margin: 0 50px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid  rgb(211, 211, 39);
    }

    th {
      background-color: rgb(2, 178, 75);
    }

    tr:hover {
      background-color: rgb(2, 178, 75);
      color: rgb(194, 194, 194);
    }

    tr:hover a{
      color: rgb(19, 16, 16);
    }

    .actions {
      display: flex;
      justify-content: center;
    }

    .actions a {
      margin-right: 10px;
    }

    a {
      transition: color 0.3s ease;
      color:  rgb(211, 211, 39);
    }
    a:hover {
      color: rgb(211, 211, 39);
    }

    .status {
      font-weight: bold;
    }
    .sort {
      cursor: pointer;
    }

    .sort::after {
      content: "\25b2";
      margin-left: 5px;
    }

    .sort.descending::after {
      content: "\25bc";
      margin-left: 5px;
    }

    select {
      padding: 8px;
      border: 1px solid rgb(211, 211, 39);
      border-radius: 4px;
      box-sizing: border-box;
    }

    button, .button {
      background-color: rgb(2, 178, 75);
      color: rgb(194, 194, 194);
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .button:hover {
      background-color: rgb(114, 218, 154);
      color:rgb(19, 16, 16);
    }
  </style>
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="admin_dashboard.php">Dashboard</a></li>
        <li><a href="manage_booking.php">Manage Bookings</a></li>
        <!-- <li><a href="manage_services.php">Manage Services</a></li> -->
        <li><a href="manage_users.php">Manage Users</a></li>
        <!-- Add more menu options as needed -->
      </ul>
    </nav>
  </header>
  <main class="main-content">
    <br/>
  <h1>Manage Bookings</h1>

  <!-- Sorting and Filtering Options -->
  <form action="" method="get">
    <label>Sort by: </label>
    <select name="sort">
      <option value="booking_id" <?php if ($sortColumn == 'booking_id') echo 'selected'; ?>>Booking ID</option>
      <option value="booking_date" <?php if ($sortColumn == 'booking_date') echo 'selected'; ?>>Booking Date</option>
      <option value="booking_time" <?php if ($sortColumn == 'booking_time') echo 'selected'; ?>>Booking Time</option>
    </select> &nbsp; &nbsp;
    <input type="radio" name="order" value="asc" <?php if ($sortOrder == 'ASC') echo 'checked'; ?>>Ascending  &nbsp;
    <input type="radio" name="order" value="desc" <?php if ($sortOrder == 'DESC') echo 'checked'; ?>>Descending
    &nbsp; &nbsp;
    <select name="status">
  <option value="">All</option>
  <option value="pending" <?php if ($filterStatus == 'pending') echo 'selected'; ?>>Pending</option>
  <option value="approved" <?php if ($filterStatus == 'approved') echo 'selected'; ?>>Approved</option>
  <option value="rejected" <?php if ($filterStatus == 'rejected') echo 'selected'; ?>>Rejected</option>
  <option value="past" <?php if ($filterStatus == 'past') echo 'selected'; ?>>Past Bookings</option>
</select>

    &nbsp; &nbsp;
    <input type="submit" value="Apply" class="button">
  </form>
    <br>
  <!-- Booking List -->
  <table>
    <tr>
      <th>Booking ID</th>
      <th>User ID</th>
      <th>Field Name</th>
      <th>Booking Date</th>
      <th>Booking Time</th>
      <th>Status</th>
      <th colspan='2'>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?php echo $row['booking_id']; ?></td>
      <td><?php echo $row['user_id']; ?></td>
      <td><?php echo $row['field_name']; ?></td>
      <td><?php echo $row['booking_date']; ?></td>
      <td><?php echo $row['booking_time']; ?></td>
      <td><?php echo $row['status']; ?></td>
      <td>
        <?php if ($row['status'] == 'Pending' || $row['status'] == 'pending') { ?>
        <a href="approve_booking.php?id=<?php echo $row['booking_id']; ?>">Approve</a>
        <?php } ?>
        <?php if ($row['status'] == 'Approved' || $row['status'] == 'approved') { ?>
        <a href="reject_booking.php?id=<?php echo $row['booking_id']; ?>">Reject</a>
        <?php } ?>
      </td>
      <td>
        <a href="edit_booking.php?id=<?php echo $row['booking_id']; ?>">Edit</a>
        <a href="delete_booking.php?id=<?php echo $row['booking_id']; ?>">Delete</a>
      </td>
    </tr>
    <?php } ?>
  </table>
  </main>
  <footer>
    <p>&copy; 2023 Admin Dashboard. All rights reserved.</p>
  </footer>
</body>
</html>
