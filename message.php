<?php
// Include the database connection
include 'db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Insert data into the messages table
    $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    
    if ($stmt->execute()) {
        echo "Message sent successfully!";
        
        // Optionally send an email notification to the admin
        $to = 'bentech667@gmail.com';
        $subject = 'New Contact Form Submission';
        $headers = 'From: ' . $email;
        $body = "Name: $name\nEmail: $email\nMessage: $message";
        
        mail($to, $subject, $body, $headers);
        
    } else {
        echo "Failed to send the message.";
    }

    $stmt->close();
    $conn->close();
}
