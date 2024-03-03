<!DOCTYPE html>
<html>
<head>
  <title>User Profile</title>
  <link rel="stylesheet" type="text/css" href="../css/allstyles.css">
  <link rel="stylesheet" href="../css/profilestyles.css">
</head>
<body>
  <?php include '../include/navbar.php'; ?>
  <div class="container">
    <h1>User Profile</h1>
    
    <div class="user-info">
      <h2>User Information:</h2>
      <table>
        <tr>
          <th>Name </th>
          <td><span id="name"></span></td>
        </tr>
        <tr>
          <th>Mobile No. </th>
          <td><span id="phone"></span></td>
        </tr>
        <tr>
          <th>Email </th>
          <td><span id="email"></span></td>
        </tr>
      </table>
    </div>
    
    <div class="booking-list">
      <h2>Booking List:</h2>
      <ul id="booking-list"></ul>
    </div>
    
    <div class="approved-bookings">
      <h2>Approved Bookings:</h2>
      <ul id="approved-bookings"></ul>
    </div>
    
    <div class="booking-history">
      <h2>Booking History:</h2>
      <ul id="booking-history"></ul>
    </div>
  </div>

  <script src="../js/profile.js"></script>
  <?php include'../include/footer.html';?>
</body>
</html>
