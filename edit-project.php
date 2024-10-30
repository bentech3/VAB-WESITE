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

// Fetch the project details
$stmt = $conn->prepare("SELECT * FROM projects WHERE id = ?");
$stmt->bind_param("i", $project_id);
$stmt->execute();
$result = $stmt->get_result();
$project = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get updated details from the form
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];

    // Update the project in the database
    $update_stmt = $conn->prepare("UPDATE projects SET title = ?, description = ?, image_url = ? WHERE id = ?");
    $update_stmt->bind_param("sssi", $title, $description, $image_url, $project_id);

    if ($update_stmt->execute()) {
        echo "Project updated successfully!";
        header("Location: admin-dashboard.php");
    } else {
        echo "Failed to update the project.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project - VAB&S ENGINEERING COMPANY LIMITED</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <h1>Edit Project</h1>
        <form method="POST">
            <div>
                <label for="title">Project Title:</label>
                <input type="text" id="title" name="title" value="<?php echo $project['title']; ?>" required>
            </div>
            <div>
                <label for="description">Project Description:</label>
                <textarea id="description" name="description" rows="4" required><?php echo $project['description']; ?></textarea>
            </div>
            <div>
                <label for="image_url">Image URL:</label>
                <input type="text" id="image_url" name="image_url" value="<?php echo $project['image_url']; ?>" required>
            </div>
            <button type="submit">Update Project</button>
        </form>
    </main>
</body>
</html>