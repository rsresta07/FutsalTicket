<!DOCTYPE html>
<html>
<head>
  <title>Contact Us</title>
  <link rel="stylesheet" type="text/css" href="css/allstyles.css">
  <link rel="stylesheet" href="css/contactstyles.css">
  <link rel="stylesheet" type="text/css" href="css/navstyles.css">
  <link rel="stylesheet" type="text/css" href="css/footerstyles.css">
</head>
<body>
  <header>
        <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="php/booking.php">Booking</a></li>
            <!-- If the user is logged in, show user profile icon -->
            <!-- Replace 'isUserLoggedIn' with the appropriate condition in your PHP code -->
            <?php
                session_start();
                if (isset($_SESSION['user'])) {
                // User is logged in, display "User Profile" link
                    echo '<li class="login"><a href="php/user_profile.php">User Profile</a></li>';
                } else {
                //If the user is not logged in, display login and registration links
                    echo '<li class="login"><a href="php/login.php">Login</a></li>';
                    echo '<li class="login"><a href="php/registration.php">Register</a></li>';
                } 
            ?>
        </ul>
        </nav>
        </header>
<main>
  <div class="container">
    <h1>Contact Us</h1>
    <br/>

    <div class="contact-info">
      <table>
        <tr><th colspan="2">Our Contact Information:</th></tr>
        <tr><td>Email </td><td>futsalticket22@gmail.com</td></tr>
        <tr><td>Phone </td><td>014956405, 014956406</td></tr>
        <tr><td>Address &nbsp; </td><td>Nursery Chowk, Khusibu, Kathmandu</td></tr>
      </table>
    </div>
    <br/>
    <br/>
    <div class="contact-form">
      <h3 align="center">Get in Touch</h2>
      <form action="php/process_contact.php" method="POST">
        <input type="text" id="name" name="name" placeholder="Name" required>
        <?php if (isset($errors['name'])) echo "<span class='error'>{$errors['name']}</span>"; ?>

        <input type="email" id="email" name="email" placeholder="E-mail" required>
        <?php if (isset($errors['email'])) echo "<span class='error'>{$errors['email']}</span>"; ?>

        <textarea id="message" name="message" placeholder="Message" required></textarea>
        <?php if (isset($errors['message'])) echo "<span class='error'>{$errors['message']}</span>"; ?>

        <center><input type="submit" value="Send Message"></center>
      </form>
    </div>
  </div>
</main>
  <?php include 'include/footer.html'; ?>
</body>
</html>
