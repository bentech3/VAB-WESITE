<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin-login.php");
    exit();
}

include 'db.php';

// Get project ID from the URL
$project_id = $_GET['id'];

// Delete the project
$stmt = $conn->prepare("DELETE FROM projects WHERE id = ?");
$stmt->bind_param("i", $project_id);

if ($stmt->execute()) {
    echo "Project deleted successfully!";
    header("Location: admin-dashboard.php");
} else {
    echo "Failed to delete the project.";
}
?>