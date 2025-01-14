<?php
session_start();
require_once '../data/DbConnect.php';

use Data\DbConnect;

// Merr lidhjen me bazën e të dhënave
$dbConnect = DbConnect::getInstance();
$connection = $dbConnect->getConnection();

// Merr të gjithë stafin
$query = "SELECT * FROM staff";
$stmt = $connection->prepare($query);
$stmt->execute();
$staff = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="About Us Page">
    <title>About Us</title>
    <link rel="stylesheet" href="../styles/aboutus.css?v=1.0"> <!-- Versionim për caching -->
</head>
<body>
<header>
    <div class="header-logo">
        <img src="../FrontImg.html/Logo.png" alt="Logo" height="90">
    </div>
    <nav>
        <ul>
            <li><a href="FrontPage.php">Home</a></li>
            <li><a href="AboutUs.php" class="active">About Us</a></li>
            <li><a href="contact.php">Contact</a></li>
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="LogOut.php">Log Out</a></li>
            <?php else: ?>
                <li><a href="LogIn.php">Log In</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<section id="about-us">
    <div class="hero">
        <h1>About Us</h1>
        <p>Welcome to our platform! We value our team and their unique contributions to our success.</p>
    </div>
</section>

<section id="team">
    <h2>Meet Our Team</h2>
    <div class="team-container">
        <?php foreach ($staff as $member): ?>
            <div class="team-member">
                <p><strong><?= htmlspecialchars($member['name']); ?></strong></p>
                <p><?= htmlspecialchars($member['experiences']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<footer>
    <p>&copy; 2025 Your Company Name. All rights reserved.</p>
</footer>
</body>
</html>
