
    <head>
        <link rel="stylesheet" type="text/css" href="../css/navstyles.css">
    </head>
    <body>
        <header>
        <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../services.php">Services</a></li>
            <li><a href="../contact.php">Contact Us</a></li>
            <li><a href="booking.php">Booking</a></li>
            <!-- If the user is logged in, show user profile icon -->
            <!-- Replace 'isUserLoggedIn' with the appropriate condition in your PHP code -->
            <?php
               
                if (isset($_SESSION['user']) || isset($_SESSION['user_id'])) {
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
    </body>
