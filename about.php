<?php
// Include database connection
include 'config.php';

// Fetch About Us content from the database
$sql = "SELECT content FROM about_us WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output the content
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . $row['content'] . "</p>";
    }
} else {
    echo "No content available.";
}

$conn->close();
?>