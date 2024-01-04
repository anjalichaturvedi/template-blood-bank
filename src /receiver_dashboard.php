<?php
        session_start();

        // Check if the user is logged in as a receiver
        if (!isset($_SESSION['username']) || $_SESSION['user_type'] !== 'receiver') {
            // Redirect to login page if the user is not logged in or is not a receiver
            header("Location: login.php");
            exit();
        }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Receiver Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
        <h2>Receiver Dashboard</h2>

        <?php
        
        // Display receiver-related information
        echo "<p>Welcome, Receiver " . $_SESSION['username'] . "!</p>";
        echo "<p>Request a blood sample <a href='request_blood_sample.php'>here</a>.</p>";
        echo "<p><a href='logout.php'>Logout</a></p>";
        ?>

        <p><a href="index.php">Back to Home</a></p>
</body>
</html>
