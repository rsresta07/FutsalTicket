<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/allstyles.css">
    <link rel="stylesheet" type="text/css" href="../css/admin_dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/navstyles.css">
    <link rel="stylesheet" type="text/css" href="../css/footerstyles.css">
</head>
<body>
    <header>
    <nav>
        <ul>
        <li><a href="admin_dashboard.php">Dashboard</a></li>
        <li><a href="manage_booking.php">Manage Bookings</a></li>
        <!-- <li><a href="manage_services.php">Manage Services</a></li> -->
        <li><a href="manage_users.php">Manage Users</a></li>
        <li class="login"><a href="../php/logout.php">Logout</a></li>
        <!-- Add more menu options as needed -->
        </ul>
    </nav>
    </header>
    <main class="main-content-container">
        <br/><hr/>
        <h1 class="heading">Welcome, Admin</h1>
        <h2 class="heading">Admin Dashboard Content</h2>
        <hr/><br/>
        <section class="main-content">
            <!-- Dashboard Overview -->
            <div class="dashboard-overview">
                <h2>Dashboard Overview</h2>
                <!-- Display relevant statistics and metrics -->
                <p><b>Total Bookings: </b>
                    <?php

                        // Include the database connection file
                        include '../include/connection.php';

                        // Query to get the total number of bookings
                        $query = "SELECT COUNT(*) AS totalBookings FROM bookings";

                        // Execute the query
                        $result = mysqli_query($conn, $query);

                        // Check if the query was successful
                        if ($result) {
                            // Fetch the total number of bookings
                            $row = mysqli_fetch_assoc($result);
                            $totalBookings = $row['totalBookings'];

                            // Display the total number of bookings
                            echo $totalBookings;
                        } else {
                            // Error occurred while executing the query
                            echo "Error: " . mysqli_error($conn);
                        }

                        // Close the database connection
                        mysqli_close($conn);
                    ?>
                </p>
                <p><b>Registered Users: </b>
                    <?php
                    // Include the database connection file
                    include '../include/connection.php';

                    // Perform the database query to count registered users
                    $query = "SELECT COUNT(*) AS totalUsers FROM users";
                    $result = mysqli_query($conn, $query);

                    // Check if the query was successful
                    if ($result) {
                        // Fetch the total number of registered users
                        $row = mysqli_fetch_assoc($result);
                        $totalUsers = $row['totalUsers'];

                        // Display the total number of registered users
                        echo $totalUsers;
                    } else {
                        // Error occurred while executing the query
                        echo "Error: " . mysqli_error($conn);
                    }

                    // Close the database connection
                    mysqli_close($conn);
                ?>

                </p>
                <!-- Add more relevant statistics here -->
            </div>

            <!-- Recent Activity
            <div class="recent-activity">
                <h2>Recent Activity</h2>
                Display a list of recent activities or events 
                <ul>
                    <li>{recent_activity_1}</li>
                    <li>{recent_activity_2}</li>
                    <li>{recent_activity_3}</li>
                     Add more recent activities here 
                </ul>
            </div> -->

            <!-- Notifications
            <div class="notifications">
                <h2>Notifications</h2>
               Display important notifications or alerts
                <ul>
                    <li>{notification_1}</li>
                    <li>{notification_2}</li>
                    <li>{notification_3}</li>
                     Add more notifications here
                </ul>
            </div> -->

            <!-- Quick Links -->
            <div class="quick-links">
                <h2>Action Links</h2>
                <!-- Display links to frequently accessed pages or actions -->
                <ul>
                    <li><a href="manage_booking.php">Manage Bookings</a></li>
                    <!-- <li><a href="manage_services.php">Manage Services</a></li> -->
                    <li><a href="manage_users.php">Manage Users</a></li>
                    <!-- Add more quick links here -->
                </ul>
            </div>

            <!-- Reports
            <div class="reports">
                <h2>Reports</h2>
                Display options to generate and view reports
                <ul>
                    <li><a href="{booking_report_url}">Booking Report</a></li>
                    <li><a href="{revenue_report_url}">Revenue Report</a></li>
                    <li><a href="{user_activity_report_url}">User Activity Report</a></li>
                    Add more report options here 
                </ul>
            </div>-->

            <!-- System Configuration 
            <div class="system-configuration">
                <h2>System Configuration</h2>
                 Display options to manage system settings and configurations
                <ul>
                    <li><a href="{update_service_prices_url}">Update Service Prices</a></li>
                    <li><a href="{manage_user_roles_url}">Manage User Roles</a></li>
                    <li><a href="{configure_email_notifications_url}">Configure Email Notifications</a></li>
                    Add more system configuration options here 
                </ul>
            </div> -->
    </section>

    </main>
    
    <footer>
        <p>&copy; 2023 Admin Dashboard. All rights reserved.</p>
    </footer>
</body>
</html>
