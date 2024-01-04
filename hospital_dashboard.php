<?php
        session_start();

        // Check if the user is logged in as a hospital
        if (!isset($_SESSION['username']) || $_SESSION['user_type'] !== 'hospital') {
            // Redirect to login page if the user is not logged in or is not a hospital
            header("Location: login.php");
            exit();
        }
        ?>
<!DOCTYPE html>
<html>
<head>
    <title>Hospital Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
        <h2>Hospital Dashboard</h2>

        <?php
        // Display hospital-related information
        echo "<p>Welcome, Hospital " . $_SESSION['username'] . "!</p>";
        echo "<ul>";
        echo "<li><a href='add_blood_info.php'>Add Blood Info</a></li>";
        echo "<li><a href='hospital_req.php'>View Requests</a></li>";
        echo "<li><a href='request_blood_sample.php'>Make Requests</a></li>";
        echo "</ul>";
        echo "<p><a href='logout.php'>Logout</a></p>";
        ?>
        <p><a href="index.php">Back to Home</a></p>
</body>
</html>
