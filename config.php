<?php
$servername = "localhost";  // For local server, it’s localhost
$username = "root";         // Default username in XAMPP/WAMP
$password = "";             // Leave empty for default setup
$dbname = "diverse_db";  // Name of the database

// Create connection
$conn = new mysqli("localhost", "root", "", "diverse_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>