<?php
// Connect to MySQL database
$conn = new mysqli("localhost", "root", "", "crime_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
