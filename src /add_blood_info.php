<?php
session_start();

// Include database connection
include('db_connect.php');

// Check if the user is logged in and is a hospital
if (!isset($_SESSION['username']) || $_SESSION['user_type'] !== 'hospital') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bloodType = $_POST['blood_type'];
    $quantity = $_POST['quantity'];

    $hospitalUsername = $_SESSION['username'];

    // Insert blood info into the hospital's blood bank
    $query = "INSERT INTO hospital_blood_bank (hospital_username, blood_type, quantity) VALUES ('$hospitalUsername', '$bloodType', '$quantity')";

    if (mysqli_query($conn, $query)) {
        echo "Blood information added successfully!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
    <title>Add Blood Info</title>
</head>
<body>
    <h2>Add Blood Info</h2>
    
    <form method="post" action="">
        Blood Type: <input type="text" name="blood_type" required><br>
        Quantity: <input type="number" name="quantity" required><br>
        <input type="submit" value="Add Blood Info">
    </form>

    <p><a href="hospital_dashboard.php">Back to Dashboard</a></p>
</body>
</html>
