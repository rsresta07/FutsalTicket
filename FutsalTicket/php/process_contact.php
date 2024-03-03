<?php
// Include the database connection file
require_once('../include/connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Perform server-side validation
  $errors = array();

  // Validate name
  if (empty($name)) {
    $errors['name'] = "Name is required";
  }

  // Validate email
  if (empty($email)) {
    $errors['email'] = "Email is required";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email format";
  }

  // Validate message
  if (empty($message)) {
    $errors['message'] = "Message is required";
  }

  // If there are no errors, process the form submission
  if (empty($errors)) {
    // Store the form data in the database
    $query = "INSERT INTO contact_form (name, email, message) VALUES ('$name', '$email', '$message')";

    if (mysqli_query($conn, $query)) {
      // Data stored in the database successfully
      echo "<script>alert('Thank you for contacting us. We will get back to you soon.');</script>";
      echo "<script>window.location.href = '../contact.php';</script>";
    } else {
      // Error storing data in the database
      echo "<script>alert('Sorry, there was an error storing your message. Please try again later.');</script>";
      echo "<script>window.location.href = '../contact.php';</script>";
    }
  }
}
