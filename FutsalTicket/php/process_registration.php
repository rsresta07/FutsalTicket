<?php
// Establish a connection to the MySQL database
include('../include/connection.php');

// Retrieve the submitted form data
$username = $_POST["username"];
$full_name = $_POST["full_name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["pass"];

// Perform server-side validation
$sql = "SELECT * FROM users WHERE username='$username' OR email='$email' OR phone='$phone'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Username or email already exists, set the error message in a session
    session_start();
    $_SESSION['errorMessage'] = "Username, email, or mobile number already exists. Please choose a different one.";
    header("Location: registration.php");
    exit();
} else {
    // Hash the password for security
    $hashedPassword = crypt($password, PASSWORD_DEFAULT);

    // Store the user information in the database
    $sql = "INSERT INTO users (username, full_name, email, phone, password) VALUES ('$username', '$full_name', '$email', '$phone', '$hashedPassword')";
    if ($conn->query($sql) === TRUE) {
        // Registration successful, redirect to the login page
        header("Location: login.php");
        exit();
    } else {
        // Error in inserting user information
        echo "Error: " . $sql;
    }
}

// Close the database connection
$conn->close();
?>
