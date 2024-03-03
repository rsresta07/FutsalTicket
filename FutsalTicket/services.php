<!DOCTYPE html>
<html>
<head>
  <title>Services</title>
  <link rel="stylesheet" type="text/css" href="css/allstyles.css"> 
  <link rel="stylesheet" href="css/servicestyles.css">
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

  <div class="container">
    <div> 
        <h1>Services</h1><br/>
    </div>
    <div class="service">
      <div>
        <img src="img/cafe1.png" alt="Service 1">
      </div>
      <div class="content">
        <h2>Cafe</h2>
        <p>café, also spelled cafe, small eating and drinking establishment, historically a coffeehouse, usually featuring a limited menu; originally these establishments served only coffee. The English term café, borrowed from the French, derives ultimately from the Turkish kahve, meaning coffee.</p>
        <a href="" class="read-btn">Read More</a>
      </div>
    </div>
    
    <div class="service">
      <div>
        <img src="img/snooker1.png" alt="Service 2">
      </div>
      <div class="content">
        <h2>Snooker</h2>
        <p>Snooker gained its identity in 1875 when army officer Neville Chamberlain, stationed in Ootacamund, Madras, and Jabalpur, devised a set of rules that combined black pool and pyramids. The word snooker was a well-established derogatory term used to describe inexperienced or first-year military personnel.</p>
        <a href="" class="read-btn">Read More</a>
      </div>
    </div>
    
    <div class="service">
      <div>
        <img src="img/parkin1.png" alt="Service 3">
      </div>
      <div class="content">
        <h2>Parking Lot</h2>
        <p>Don't use the word `parking' to refer to a place where cars are parked. Instead, say car park in British English and parking lot in American English. We parked in the car park next to the theatre. The high school parking lot was filled with cars.</p>
        <a href="" class="read-btn">Read More</a>
      </div>
    </div>
  </div>
  <?php include'include/footer.html'; ?>
</body>
</html>
