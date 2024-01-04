<?php
session_start();

// Include database connection
include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userType = $_POST['user_type'];

    if ($userType == 'receiver') {
        $bloodGroup = $_POST['blood_group'];
        $query = "SELECT * FROM users WHERE username='$username' AND user_type='receiver'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Update existing receiver record
            $updateQuery = "UPDATE users SET password='$password', blood_group='$bloodGroup' WHERE username='$username' AND user_type='receiver'";
            if (mysqli_query($conn, $updateQuery)) {
                echo "Profile updated successfully!";
            } else {
                echo "Error updating profile: " . mysqli_error($conn);
            }
        } else {
            // Insert new receiver record
            $insertQuery = "INSERT INTO users (username, password, blood_group, user_type) VALUES ('$username', '$password', '$bloodGroup', '$userType')";
            if (mysqli_query($conn, $insertQuery)) {
                echo "Registration successful!";
            } else {
                echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
            }
        }
    } elseif ($userType == 'hospital') {
        $hospitalName = $_POST['hospital_name'];
        $query = "SELECT * FROM hospitals WHERE username='$username'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Update existing hospital record
            $updateQuery = "UPDATE hospitals SET password='$password', hospital_name='$hospitalName' WHERE username='$username'";
            if (mysqli_query($conn, $updateQuery)) {
                echo "Profile updated successfully!";
            } else {
                echo "Error updating profile: " . mysqli_error($conn);
            }
        } else {
            // Insert new hospital record
            $insertQuery = "INSERT INTO hospitals (username, password, hospital_name, user_type) VALUES ('$username', '$password', '$hospitalName', '$userType')";
            if (mysqli_query($conn, $insertQuery)) {
                echo "Registration successful!";
            } else {
                echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Registration</h2>
    <form method="post" action="">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        User Type:
        <select name="user_type" required>
            <option value="receiver">Receiver</option>
            <option value="hospital">Hospital</option>
        </select><br>

        <?php
        // Show additional field for blood group if the user is a receiver
        if ($userType == 'receiver') {
            echo 'Blood Group: <input type="text" name="blood_group" required><br>';
        } elseif ($userType == 'hospital') {
            echo 'Hospital Name: <input type="text" name="hospital_name" required><br>';
        }
        ?>

        <input type="submit" value="Register">
    </form>
</body>
</html>
