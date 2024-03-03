<?php
session_start();
include '../include/connection.php';

// Retrieve the submitted form data

$userID = $_SESSION['user_id'];
$bookingDate = $_POST['booking_date'];
$bookingTime = $_POST['booking_time'];
$selectedField = $_POST['selected_field'];

// Perform server-side validation
$errors = array();

// Validate the booking date and time (you can add additional validation rules)
if (empty($bookingDate)) {
    $errors[] = "Booking date is required.";
}

if (empty($bookingTime)) {
    $errors[] = "Booking time is required.";
}

// Check if there are any validation errors
if (count($errors) > 0) {
    // Display the errors and redirect back to the booking page with the errors
    $_SESSION['errors'] = $errors;
    header("Location: booking.php");
    exit();
}

// Perform the database insertion
$query = "INSERT INTO bookings (user_id, field_id, booking_date, booking_time, status) 
          VALUES ('$userID','$selectedField', '$bookingDate', '$bookingTime', 'Pending')";

if($selectedField="1") {
    $fieldname="Field A";
} elseif($selectedField="2") {
    $fieldname="Field B";
} else {
    $fieldname="Field C";
}

if (mysqli_query($conn, $query)) {
    // Booking successfully stored in the database
    header("Location: ../include/confirmation.php?booking_date='$bookingDate'&booking_time='$bookingTime'&selected_field='$fieldname'");
    exit();
} else {
    // Error occurred during database insertion
    echo "Error: " . mysqli_error($conn);
}
?>
