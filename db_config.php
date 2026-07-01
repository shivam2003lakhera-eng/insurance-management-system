<?php
$servername = "localhost";
$username = "root";
$password = "2003"; // Update if you set a password for MySQL
$dbname = "insurance_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
