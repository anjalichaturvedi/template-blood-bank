<?php
// Include database connection
include('db_connect.php');

// Check if the user is logged in
session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['user_type'])) {
    // Redirect to login page if the user is not logged in
    header("Location: login.php");
    exit();
}

// Get user details from the session
$username = $_SESSION['username'];
$userType = $_SESSION['user_type'];

// Check if the user is a hospital and has already submitted a request
if ($userType === 'hospital') {
    // Redirect to a page informing that the hospital can't request another sample
    header("Location: already_requested.php");
    exit();
}

// For receiver: Get the receiver details from the session
$receiverUsername = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Request Blood Sample</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Request Blood Sample</h2>

    <?php
    if ($userType === 'receiver') {
        // Display form for receivers to request a sample
        echo "<p>Logged in as: $receiverUsername</p>";
        echo "<form method='post' action='process_request.php'>";
        echo "<input type='text' name='receiverUsername' value='$receiverUsername'>";
        echo "<input type='text' name='bloodGroup' value='$receiverBloodGroup'>";
        echo "<label for='hospitalName'>Hospital Username:</label>";
        echo "<input type='text' id='hospitalName' name='hospitalName' required><br>";
        echo "<input type='submit' value='Request Sample'>";
        echo "</form>";
    } else {
        // Display message for hospitals
        echo "<p>You are logged in as a hospital. Please contact the administrator if you have questions.</p>";
    }
    ?>

    <p><a href="index.php">Back to Home</a></p>
</body>
</html>
