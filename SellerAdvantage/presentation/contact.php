<?php
require_once '../data/DbConnect.php';
require_once '../data/MessageRepository.php';
require_once '../business/MessageHandler.php';

use Data\DbConnect;
use Data\MessageRepository;
use Business\MessageHandler;


$dbConnect = new DbConnect();
$connection = $dbConnect->getConnection();
$messageRepository = new MessageRepository($connection);
$messageHandler = new MessageHandler($messageRepository);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="../style/contact.css">
</head>
<body>
<header>
    <ul>
        <li><a href="../presentation/FrontPage.php">Home</a></li>
        <li><a href="../presentation/AboutUs.php">About Us</a></li>
        <li><a href="../presentation/contact.php">Contact</a></li>
        <li><a href="../presentation/LogIn.php">Log In</a></li>
        <li><a href="../presentation/LogOut.php">Log Out</a></li>
    </ul>

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
