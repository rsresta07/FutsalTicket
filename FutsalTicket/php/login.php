<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="../css/allstyles.css">
  <link rel="stylesheet" type="text/css" href="../css/loginstyles.css">
</head>
<body>
  <?php include'../include/navbar.php';?> 
  <div class="container">
  <h1>Login</h1><br/>
    <form id="loginForm" method="POST" action="process_login.php" onsubmit="return validateLoginForm()">
      <input type="text" id="username" name="username" placeholder="Username / Phone Number" required>
      <input type="password" id="password" name="password" placeholder="Password" required>
      <center><br/><input type="submit" value="Login"></center><br/>
      <center><p>New user? <a href="registration.php"><u>Register here</u></a></p></center>
    </form>
  </div>
    <?php include'../include/footer.html';?>
</body>
</html>
