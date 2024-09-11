<?php
// db.php: Database connection settings
$servername = "localhost";
$username = "root"; // Default MySQL username for XAMPP/WAMP
$password = ""; // Default MySQL password for XAMPP/WAMP
$dbname = "task_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
