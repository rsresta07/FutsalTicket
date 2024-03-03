<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Futsal Reservation System</title>
  <link rel="stylesheet" type="text/css" href="css/allstyles.css">
  <link rel="stylesheet" type="text/css" href="css/navstyles.css">
  <link rel="stylesheet" type="text/css" href="css/indexstyles.css">
  <link rel="stylesheet" type="text/css" href="css/footerstyles.css">
  <style>
    /* Additional CSS styles or inline styles if needed */
  </style>
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="php/booking.php">Booking</a></li>
        <?php
          session_start();
          if (isset($_SESSION['user'])) {
            echo '<li class="login"><a href="php/user_profile.php">User Profile</a></li>';
          } else {
            echo '<li class="login"><a href="php/login.php">Login</a></li>';
            echo '<li class="login"><a href="php/registration.php">Register</a></li>';
          } 
        ?>
      </ul>
    </nav>
  </header>

  <section class="hero-section">
    <div class="container01">
      <div class="hero-content">
        <h1>Welcome to FutsalTicket</h1>
        <p class="pheader">Book your futsal field online.</p>
      </div>
    </div>
  </section>

  <section class="services-section">
    <div class="container"> 
      <div class="service">
        <div class="service-col">
          <div class="service-row">
            <div class="img-container">
              <img src="img/cafe1.png" alt="Cafe Image" class="img001">
            </div>
            <div class="text-container">
              <h5>Cafe</h5>
              <p>A small restaurant selling light meals and drinks.</p>
            </div>
          </div>
          <div class="service-row">
            <div class="img-container">
              <img src="img/snooker1.png" alt="Snooker Image" class="img001">
            </div>
            <div class="text-container">
              <h5>Snooker</h5>
              <p>The word snooker was a well-established derogatory term used to describe inexperienced or first-year military personnel.</p>
            </div>
          </div>
          <div class="service-row">
            <div class="img-container">
              <img src="img/parkin1.png" alt="Parking Lot Image" class="img001">
            </div>
            <div class="text-container">
              <h5>Parking Lot</h5>
              <p>An area where cars or other vehicles may be left temporarily; a car park.</p>
            </div>
          </div>
          <!-- Add more service sections as needed -->
        </div>
      </div>
    </div>
    <section>
      <div class="booking-section">
        <div class="booking-context">
          <h2>Make your reservation now</h2>
        </div>
        <div class="booking-btn">
          <a href="php/booking.php" class="book-now-btn">Book Now</a>
        </div>
      </div>
    </section>
  </section>
  <br/>
  <?php include 'include/footer.html'; ?>
</body>
</html>
