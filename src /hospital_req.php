<?php
// Include database connection
include('db_connect.php');

// Check if the user is logged in as a hospital
session_start();
if (!isset($_SESSION['username']) || $_SESSION['user_type'] !== 'hospital') {
    // Redirect to login page if the user is not logged in or is not a hospital
    header("Location: login.php");
    exit();
}

// Get the hospital username
$hospitalUsername = $_SESSION['username'];

// Query to retrieve blood sample requests for the hospital
$query = "SELECT * FROM blood_sample_requests WHERE hospital_username = '$hospitalUsername'";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hospital View Requests</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Hospital View Requests</h2>

    <?php
    // Display blood sample requests
    while ($row = mysqli_fetch_assoc($result)) {
        $requesterName = $row['requester_name'];
        $requestedBloodGroup = $row['requested_blood_group'];

        echo "<p>Requester: $requesterName | Requested Blood Group: $requestedBloodGroup</p>";
    }
    ?>

    <p><a href="hospital_dashboard.php">Back to Hospital Dashboard</a></p>
</body>
</html>
