<?php
session_start();

// Include database connection
include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check in 'users' table
    $queryUsers = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $resultUsers = mysqli_query($conn, $queryUsers);

    // Check in 'hospitals' table
    $queryHospitals = "SELECT * FROM hospitals WHERE username='$username' AND password='$password'";
    $resultHospitals = mysqli_query($conn, $queryHospitals);

    if ($resultUsers && mysqli_num_rows($resultUsers) > 0) {
        $row = mysqli_fetch_assoc($resultUsers);
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_type'] = $row['user_type'];
        header("Location: receiver_dashboard.php"); // Redirect to receiver dashboard
        exit();
    } elseif ($resultHospitals && mysqli_num_rows($resultHospitals) > 0) {
        $row = mysqli_fetch_assoc($resultHospitals);
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_type'] = 'hospital';
        header("Location: hospital_dashboard.php"); // Redirect to hospital dashboard
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Login</h2>
    
    <?php
    if (isset($error)) {
        echo "<p style='color:red;'>$error</p>";
    }
    ?>
    
    <form method="post" action="">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
    <p>Not registered? <a href="register.php">Register</a></p>
        <p>View available blood samples <a href="available_blood_sample.php">here</a>.</p>
</body>
</html>
