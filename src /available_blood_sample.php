<?php
// Include database connection
include('db_connect.php');

// Query to retrieve available blood samples
$query = "SELECT * FROM hospital_blood_bank";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Available Blood Samples</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Available Blood Samples</h2>

    <?php
    // Display blood samples
    while ($row = mysqli_fetch_assoc($result)) {
        $sampleBloodGroup = $row['blood_type'];
        $hospitalName = $row['hospital_username'];

        echo "<p>Blood Type: $sampleBloodGroup | Hospital: $hospitalName";

        // Display 'Request Sample' button with confirmation dialog
        echo " | <button onclick=\"confirmRequest('$sampleBloodGroup', '$hospitalName')\">Request Sample</button>";

        echo "</p>";
    }
    ?>

    <p><a href="index.php">Back to Home</a></p>

    <script>
        // JavaScript function to ask for confirmation and redirect to login
        function confirmRequest(bloodGroup, hospitalName) {
            // Ask for confirmation
            var userConfirmed = confirm("Do you want to request a sample?");

            // If the user confirms, redirect to login
            if (userConfirmed) {
                window.location.href = 'login.php';
            }
        }
    </script>
</body>
</html>
