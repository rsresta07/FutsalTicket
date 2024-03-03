<!-- manage_users.html -->
<!DOCTYPE html>
<html>
<head>
    <title>Manage User Accounts</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" type="text/css" href="../css/allstyles.css">
    <link rel="stylesheet" type="text/css" href="../css/navstyles.css">
    <link rel="stylesheet" type="text/css" href="../css/footerstyles.css">
    <style>
        /* cointainer */
        .container{
            /* to make footer at bottom */
            flex-grow: 1;
            margin: 0 50px;
            color:rgb(194, 194, 194);
        }
        h1 {
            text-align: center;
        }
        /* Table Styles */
        .user-accounts-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .user-accounts-table th,
        .user-accounts-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid  rgb(211, 211, 39);
            color: rgb(194, 194, 194);
        }
        
        tr:hover {
        background-color: rgb(2, 178, 75);
        color: rgb(194, 194, 194);
        }

        tr:hover a{
        color: rgb(19, 16, 16);
        }
            
        .user-accounts-table th {
            background-color: rgb(2, 178, 75);
            font-weight: bold;
            color:rgb(194,194,194);
        }
        
        /* Link Styles */
        .user-action-link {
            color: rgb(211, 211, 39);
            text-decoration: none;
        }
    
        .user-action-link:hover {
            text-decoration: underline;
        }
    </style>

</head>
<body>
    <header>
    <nav>
        <ul>
        <li><a href="admin_dashboard.php">Dashboard</a></li>
        <li><a href="manage_booking.php">Manage Bookings</a></li>
        <!-- <li><a href="manage_services.php">Manage Services</a></li> -->
        <li><a href="manage_users.php">Manage Users</a></li>
        <!-- Add more menu options as needed -->
        </ul>
    </nav>
    </header><br/>
    <main class="container">
  <h1>Manage User Accounts</h1>
  <br/>
  <!-- Table to display user accounts -->
  <table class="user-accounts-table">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Action</th>
    </tr>
    <?php include 'get_user_accounts.php'; ?>
  </table>
    </main>
  <footer>
        <p>&copy; 2023 Admin Dashboard. All rights reserved.</p>
    </footer>
</body>
</html>
