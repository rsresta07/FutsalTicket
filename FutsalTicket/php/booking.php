
<!DOCTYPE html>
<html>
<head>
  <title>Booking Page</title>
  <link rel="stylesheet" type="text/css" href="../css/allstyles.css">
  <link rel="stylesheet" href="../css/bookstyles.css">
  <link rel="stylesheet" href="../css/navstyles.css">
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../services.php">Services</a></li>
        <li><a href="../contact.php">Contact Us</a></li>
        <li><a href="booking.php">Booking</a></li>
        <li class="login"><a href="../php/logout.php">Logout</a></li>
        <li class="login"><a href="../php/user_profile.php">User Profile</a></li>
        </ul>
        </nav>
        </header>
  <?php include '../include/connection.php';?>
  <main>
    <br>
  <div class="container">
    <h1>Booking Page</h1>
    
    <?php
    session_start();
    // Check if the user is not logged in and redirect to the registration page
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['user'])) {
      header("Location: registration.php");
      exit();
    }
    ?>
    <form action="process_booking.php" method="POST">
      <label for="booking_date">Booking Date</label>
      <input type="date" id="booking_date" name="booking_date" onchange="getFieldStatus()" required min="<?php echo date('Y-m-d'); ?>">
      
      <label for="booking_time">Booking Time</label>
      <select name="booking_time" id="booking_time" onchange="getFieldStatus()">
      <?php
        $startHour = 6; // Starting hour
        $endHour = 21; // Ending hour

        echo "<option value=''>Choose Time</option>";
        // Loop through the hours and generate the options
        for ($hour = $startHour; $hour <= $endHour; $hour++) {
          // Format the hour with leading zero if necessary
          $formattedHour = sprintf('%02d', $hour);

          // Generate the time option
          echo "<option value='$formattedHour:00:00'>$formattedHour:00:00</option>";
          // echo "<option value='$formattedHour:30'>$formattedHour:30</option>";
        }
      ?>
    </select>
      <br/><br/>
      <h3>Fields Status</h3>
<div id="field_status">
  <select name="selected_field" id="selected_field" required>
    <option value="">Select Field</option>
  </select>
</div><br/>
<input type="submit" value="Book">
  </main>
  <?php include '../include/footer.html'; ?>
</body>
</html>

<script>
  function getFieldStatus() {

    // Get the current date and time
  var currentDateTime = new Date();
  var currentHour = currentDateTime.getHours();
  var currentMinutes = currentDateTime.getMinutes();

  // Get the selected date and time
  var selectedDate = document.getElementById("booking_date").value;
  var selectedTime = document.getElementById("booking_time");

  // Clear previous disabled options
  selectedTime.querySelectorAll('option').forEach(option => {
    option.disabled = false;
  });

  // Loop through the time options and disable past times
  for (var i = selectedTime.options.length - 1; i >= 0; i--) {
    var optionValue = selectedTime.options[i].value;
    var optionHour = parseInt(optionValue.split(':')[0]);
    var optionMinutes = parseInt(optionValue.split(':')[1]);

    if (selectedDate === "<?php echo date('Y-m-d'); ?>" && (optionHour < currentHour || (optionHour === currentHour && optionMinutes < currentMinutes))) {
      selectedTime.options[i].disabled = true;
    }
  }


    // Get the selected date and time
    var selectedDate = document.getElementById("booking_date").value;
    var selectedTime = document.getElementById("booking_time").value;

    // Create an XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Set up the AJAX request
    xhr.open("GET", "get_field_status.php?booking_date=" + selectedDate + "&booking_time=" + selectedTime, true);

    // Define the callback function
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // Process the response
        var response = xhr.responseText;

        // Update the field status element with the received data
        document.getElementById("field_status").innerHTML = response;
      }
    };

    // Send the AJAX request
    xhr.send();
  }
</script>

