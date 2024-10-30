<?php
// Include database connection
include 'config.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $about_content = $_POST['about_content'];

    // Update the 'about_us' table in the database
    $sql = "UPDATE about_us SET content = ? WHERE id = 1";

    // Prepare statement to avoid SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $about_content);

        if ($stmt->execute()) {
            echo "About Us section updated successfully.";
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>