<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="../styles/contact.css?v=4">
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

<div class="contact-form">
    <h2>Contact Us</h2>
    <form action="" method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>

        <label for="message">Message</label>
        <textarea id="message" name="message" rows="4" placeholder="Enter your message" required></textarea>

        <button type="submit">Send Message</button>
    </form>
</div>
</body>
</html>
