<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Learn more about our company and values.">
    <meta name="keywords" content="About Us, Company, Team, Values">
    <meta name="author" content="Your Company Name">
    <title>About Us | Furniture Shop</title>
    <link rel="stylesheet" href="../styles/aboutus.css"> <!-- Path corrected for CSS -->
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-logo">
            <img src="../FrontImg.html/Logo.png" alt="Logo" height="90"> <!-- Path corrected -->
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

    <!-- About Us Section -->
    <section id="about-us">
        <div class="content">
            <h1>About Us</h1>
            <p>Welcome to Furniture Shop! We are dedicated to providing you with the best furniture that blends style and comfort. With a strong focus on sustainability and customer satisfaction, we aim to transform your home into a beautiful and cozy space.</p>
            <p>Our team consists of passionate individuals who are committed to bringing you unique designs and high-quality products. From modern to rustic styles, we have something for everyone!</p>
        </div>
        <div class="image">
            <img src="../FrontImg.html/aboutus6.jpg" alt="About Us Image"> <!-- Path corrected -->
        </div>
    </section>

    <!-- Mission and Vision -->
    <section id="mission-vision">
        <h2>Our Mission</h2>
        <p>To deliver innovative and sustainable furniture solutions that enhance the living experience of our customers.</p>
        <h2>Our Vision</h2>
        <p>To become a global leader in the furniture industry, known for our creativity, quality, and customer-centric approach.</p>
    </section>

    <!-- Team Section -->
    <section id="team">
        <h2>Meet Our Team</h2>
        <div class="team-grid">
            <div class="team-member">
            <img src="../FrontImg.html/team1.jpg" alt="Team Member 1">
                <p>Jane Doe - CEO</p>
            </div>
            <div class="team-member">
                <img src="../FrontImg.html/team2.jpg" alt="Team Member 2">
                <p>John Smith - Designer</p>
            </div>
            <div class="team-member">
                <img src="../FrontImg.html/team3.jpg" alt="Team Member 3">
                <p>Emily Johnson - Marketing</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="f">
                <h2>About Us</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae dolorum rem eos placeat perspiciatis quas.</p>
                <ul>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <p>&copy; 2024 Your Company Name. All rights reserved.</p>
    </footer>

    <script src="../scripts/main.js"></script> <!-- JS -->
</body>
</html>
