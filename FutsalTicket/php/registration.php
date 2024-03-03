<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="../css/allstyles.css">
  <link rel="stylesheet" type="text/css" href="../css/regisstyles.css">
  <script src="../js/regisval.js"></script>
</head>
<body>
  <?php include '../include/navbar.php'; 
  session_start(); ?>

  <div class="container">
    <h1>Registration</h1><br/>
    <form id="registrationForm" method="POST" action="process_registration.php" onsubmit="return validateRegistrationForm()" class="regisform">
        <input type="text" id="username" name="username" placeholder="Username" required>
        <span id="usernameError" class="error"></span> <!-- Error message for username -->

        <input type="text" id="name" name="full_name" placeholder="Name" required>
        <!-- Add more input fields and corresponding error spans for other form fields -->

        <input type="email" id="email" name="email" placeholder="Email" required>
        <span id="emailError" class="error"></span> <!-- Error message for email -->

        <input type="phone" id="phone" name="phone" placeholder="Mobile Number" required>
        <span id="phoneError" class="error"></span> <!-- Error message for phone -->

        <input type="password" id="pass" name="pass" placeholder="Password" required>
        <span id="passError" class="error"></span> <!-- Error message for password -->

        <input type="password" id="repass" name="repass" placeholder="Confirm Password" required>
        <span id="repassError" class="error"></span> <!-- Error message for confirm password -->

        <br/><center><input type="submit" value="Register"></center><br/>
        <?php if (isset($_SESSION['errorMessage'])) { ?>
            <p class="error-message"><?php echo $_SESSION['errorMessage']; ?></p>
            <?php unset($_SESSION['errorMessage']); ?>
        <?php } ?>
        <!-- Add additional form fields here -->
        <center><p class="alr">Already have an account? <a href="login.php"><u>Login here</u></a></p></center>
    </form>
  </div>
  <br>
  <?php include '../include/footer.html'; ?>
</body>
</html>
