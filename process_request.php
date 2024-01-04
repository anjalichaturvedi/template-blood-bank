<?php
// Include database connection
include('db_connect.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $receiverUsername = $_POST['receiverUsername'];
    $bloodGroup = $_POST['bloodGroup'];
    $hospitalName = $_POST['hospitalName'];

    // Insert data into the blood_sample_requests table
    $insertQuery = "INSERT INTO blood_sample_requests (requester_name, requested_blood_group, hospital_username)
                    VALUES ('$receiverUsername', '$bloodGroup', '$hospitalName')";
    
    $result = mysqli_query($conn, $insertQuery);

    if ($result) {
        echo "Request submitted successfully!";
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
    }
} else {
    // Redirect to the home page if the form is not submitted
    header("Location: index.php");
    exit();
}
?>
