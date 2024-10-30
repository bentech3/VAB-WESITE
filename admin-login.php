<?php
session_start();

// Hardcoded admin credentials
$admin_username = 'admin';
$admin_password = 'password123';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == $admin_username && $password == $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin-dashboard.php");
        exit();
    } else {
        $error = "Invalid login credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - VAB&S ENGINEERING COMPANY LIMITED</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <h1>Admin Login</h1>
        <form method="POST">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    </main>
</body>
</html>