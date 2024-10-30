<?php
include 'db.php';

// Fetch all projects from the database
$result = $conn->query("SELECT * FROM projects");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects - VAB&S ENGINEERING COMPANY LIMITED</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="projects.php">Projects</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <!-- Page Title Section -->
        <section class="page-title">
            <h1>Our Projects</h1>
            <p>Explore our construction projects.</p>
        </section>

        <!-- Projects Section -->
        <section class="projects">
            <div class="project-grid">
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <div class="project-item">
                        <h2><?php echo $row['title']; ?></h2>
                        <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['title']; ?>" width="300">
                        <p><?php echo $row['description']; ?></p>
                    </div>
                <?php } ?>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 VAB&S ENGINEERING COMPANY LIMITED</p>
    </footer>
</body>
</html>