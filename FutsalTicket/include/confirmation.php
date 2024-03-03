<!DOCTYPE html>
<html>
<head>
  <title>Booking Confirmation</title>
  <link rel="stylesheet" type="text/css" href="../css/allstyles.css">
  <link rel="stylesheet" type="text/css" href="../css/confirmstyles.css">
  <link rel="stylesheet" type="text/css" href="../css/navstyles.css">
</head>
<body>
  <?php 
  session_start();
  ?>
  <header>
        <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../services.php">Services</a></li>
            <li><a href="../contact.php">Contact Us</a></li>
            <li><a href="../php/booking.php">Booking</a></li>
            <!-- If the user is logged in, show user profile icon -->
            <!-- Replace 'isUserLoggedIn' with the appropriate condition in your PHP code -->
            <?php
               
                if (isset($_SESSION['user'])) {
                // User is logged in, display "User Profile" link
                    echo '<li class="login"><a href="../php/logout.php">Logout</a></li>';
                    echo '<li class="login"><a href="../php/user_profile.php">User Profile</a></li>';
                } else {
                //If the user is not logged in, display login and registration links
                    echo '<li class="login"><a href="../php/login.php">Login</a></li>';
                    echo '<li class="login"><a href="../php/registration.php">Register</a></li>';
                } 
            ?>
        </ul>
        </nav>
        </header>
  <main>
  <div class="container">
    <h1>Booking Confirmation</h1>
    <div class="confirmation">
      <p>Your booking has been successfully processed!</p>
      <div class="tbl">
      <table>
        <tr>
          <th colspan="2">Booking Details:</th>
        </tr>
        <tr>
          <td><strong>Date:</strong></td>
          <td><span id="booking-date"></span></td>
        </tr>
        <tr>
          <td><strong>Time:</strong></td>
          <td><span id="booking-time"></span></td>
        </tr>
        <tr>
          <td><strong>Field:</strong></td>
          <td><span id="booking-field"></span></td>
        </tr>
      </table>
      </div>
      <p>Thank you for using our Futsal Reservation System.</p>
    </div>
  </div>
  </main>
  <?php include'footer.html'?>
  <script src="../js/confirmation.js"></script>
</body>
</html>
