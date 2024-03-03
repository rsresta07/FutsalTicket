<?php
// Start the session
session_start();

// Establish a connection to the MySQL database
require_once('../include/connection.php');

// Retrieve the submitted form data
$username = $_POST["username"];
$password = $_POST["password"];

// Perform server-side validation and authentication for admin
if (empty($username) || empty($password)) {
  // Required fields are missing
  header("Location: login.php?error=Please fill in all the fields.");
  exit();
}

// Perform authentication
$adminquery = "SELECT * FROM admin WHERE username = '$username' LIMIT 1";
$adminresult = mysqli_query($conn, $adminquery);

if (mysqli_num_rows($adminresult) === 1) {
  // Admin account found
  $admin = mysqli_fetch_assoc($adminresult);

  // if (password_verify($password, $admin['password'])) {
    // Password is correct, create a session for the admin
    session_start();
    $_SESSION['admin'] = $admin['id'];

    // Redirect to the admin dashboard or any other desired page
    header("Location: admin_dashboard.php");
    exit();
  // } else {
  //   // Invalid password
  //   header("Location: admin_login.php?error=Invalid password.");
  //   exit();
  // }
}

// Perform server-side validation and authentication for user
$sql = "SELECT * FROM users WHERE username='$username' OR phone='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashedPassword = $row["password"];
    if ($a= password_verify($password, $hashedPassword)) {
        // Authentication successful, set session variable and redirect to the profile page
        $_SESSION["user"] = $row["username"];
        $_SESSION["user_id"] = $row["id"];
        header("Location: user_profile.php");
        exit();
     }
}

// // Authentication failed, display error message
echo "<script>
        alert('Invalid username or password. Please try again.');
        window.location.href = 'login.php'; // Redirect back to the login page
      </script>";

?>
