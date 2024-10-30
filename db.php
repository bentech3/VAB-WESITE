<?php
// Database connection settings
$host = 'localhost';   // or the actual database server hostname
$user = 'root';        // MySQL username
$password = '';        // MySQL password
$dbname = 'diverse_db';  // Database name

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// If connected successfully
echo "connected successfully to the database!";