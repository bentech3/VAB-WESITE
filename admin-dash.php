<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin-login.php");
    exit();
}

include 'db.php';

// Handle form submission for adding new projects
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];  // In real case, you'd handle file uploads

    // Insert the new project into the database
    $stmt = $conn->prepare("INSERT INTO projects (title, description, image_url) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $description, $image_url);
    
    if ($stmt->execute()) {
        echo "Project added successfully!";
    } else {
        echo "Failed to add the project.";
    }

    $stmt->close();
}

// Fetch all projects
$result = $conn->query("SELECT * FROM projects");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - VAB&S ENGINEERING COMPANY LIMITED</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <h1>Admin Dashboard</h1>
        <section>
            <h2>Add New Project</h2>
            <form method="POST">
                <div>
                    <label for="title">Project Title:</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div>
                    <label for="description">Project Description:</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>
                <div>
                    <label for="image_url">Image URL:</label>
                    <input type="text" id="image_url" name="image_url" required>
                </div>
                <button type="submit">Add Project</button>
            </form>
        </section>

        <section>
            <h2>Manage Projects</h2>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['title']; ?>" width="100"></td>
                            <td>
                                <a href="edit-project.php?id=<?php echo $row['id']; ?>">Edit</a> |
                                <a href="delete-project.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>