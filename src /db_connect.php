<?php
$servername = "localhost";
$username = "id21751258_bloodbank";
$password = "Dbms$1234";
$dbname = "id21751258_blood_bank";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
