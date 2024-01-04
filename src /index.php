<?php
session_start();

// Include database connection
include('db_connect.php');

// Redirect to login page if user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Redirect to the appropriate dashboard based on user type
if ($_SESSION['user_type'] == 'receiver') {
    header("Location: receiver_dashboard.php");
} elseif ($_SESSION['user_type'] == 'hospital') {
    header("Location: hospital_dashboard.php");
} else {
    // Handle other user types or roles as needed
    echo "Invalid user type!";
}
?>
