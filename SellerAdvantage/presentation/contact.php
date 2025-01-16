<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: LogIn.php");
    exit();
}

require_once '../autoload.php';

use Data\MessageRepository;
use Business\MessageHandler;

$messageRepository = new MessageRepository();
$messageHandler = new MessageHandler($messageRepository);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars(trim($_POST['username']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $messageContent = htmlspecialchars(trim($_POST['message']));

    try {
        if (empty($username) || empty($email) || empty($messageContent)) {
            throw new Exception("All fields are required.");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format.");
        }

        $result = $messageHandler->saveMessage($username, $email, $messageContent);

        if ($result) {
            echo '<script>alert("Message sent successfully."); window.location.href = "contact.php";</script>';
        } else {
            throw new Exception("Failed to save the message.");
        }
    } catch (Exception $e) {
        echo '<script>alert("' . $e->getMessage() . '");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="../styles/contact.css">



    <style>


 </style>

</head>

<body>
    <header>
            <div class="headeri">
            <img src="../FrontImg.html/Logo.png" alt="Logo" height="60">
            </div>
            <ul>
                <li><a style="text-decoration: none; color: black;" href="FrontPage.php">Home</a></li>
                <li><a style="text-decoration: none; color: black;" href="AboutUs.php">AboutUs</a></li>
                <li><a style="text-decoration: none; color: black;" href="contact.php">Contact</a></li>
                <li><a style="text-decoration: none; color: black;" href="LogIn.php">Log in</a></li>
                <li><a style="text-decoration: none; color: black;" href="LogOut.php">Log Out</a></li>
              
            </ul>
        </header>

    <div class="contact-form">

    <div class="first">
        <div class="contact">
        <form action="contact.php" method="post">
        <label for="username"></label>
        <input type="text" id="username" name="username" placeholder="username" required><br>

        <label for="email"></label>
        <input  type="email" id="email" name="email" placeholder="email" required><br>

        <label for="message"></label>
        <textarea style="width:500px;" id="message" name="message" rows="4" placeholder="message" required></textarea><br>

        <input type="submit" value="Submit">
    </form>
        </div>
    
    

    <div class="link-blog">
                <div>
                    <h1 style="color:black;">Lacus interdum</h1>
                    <h3>>> Lorem ipsum dolor</h3>
                    <h3>>> Suspendisse in neque</h3>
                    <h3>>> Present et eros</h3>
                    <h3>>> Lorem ipsum dolor</h3>
                    <h3>>> Suspendisse in neque</h3>
                    <h3>>> Present et eros</h3>
                </div>
                <div>
                    <h1 style="color:black;">Lacus interdum</h1>
                    <h3>>> Lorem ipsum dolor</h3>
                    <h3>>> Suspendisse in neque</h3>
                    <h3>>> Present et eros</h3>
                    <h3>>> Lorem ipsum dolor</h3>
                    <h3>>> Suspendisse in neque</h3>
                    <h3>>> Present et eros</h3>
                </div>
                <div>
                    <h1 style="color:black;">Lacus interdum</h1>
                    <h3>>> Lorem ipsum dolor</h3>
                    <h3>>> Suspendisse in neque</h3>
                    <h3>>>Present et eros</h3>
                    <h3>>> Lorem ipsum dolor</h3>
                    <h3>>> Suspendisse in neque</h3>
                    <h3>>> Present et eros</h3>
                </div>
            </div>
        </div>
        <div class="footer-second">
            <div class="blog-posts">
                <h1 style="color:black;">From The Blog</h1>
                <h2>Sednulla nam nibh a nibh eu urna facinia.</h2>
                <p>Sednulla nam nibh a nibh eu urna facinia mauristibulus sit urna. Vitaerisus lobortis proin elit et curabituris
                    elit estibulum cursus iacus orci. Dignissimmorbi rhoncus sed netus ligula...</p>
                <h2>Sednulla nam nibh a nibh eu urna facinia.</h2>
                <p>Sednulla nam nibh a nibh eu urna facinia mauristibulus sit urna. Vitaerisus lobortis proin elit et curabituris
    elit estibulum cursus iacus orci. Dignissimmorbi rhoncus sed netus ligula...</p>
</div>
<div class="details">
    <div class="our-details">
        <h1 style="color:black;">Our Details</h1>
        <span>Company name</span>
        <span>Street Name & Number</span>
        <span>Town</span>
        <span>Postcode/Zip</span>
        <span>Tel:</span>
        <span>xxxxx xxxxxxxxxx</span>
        <span>Fax:</span>
        <span>xxxxx xxxxxxxxxx</span>
        <span>Email:</span>
        <a href="mailto:ab65060@ubt-uni.net">ab65060@ubt-uni.net</a>
    </div>
    <div class="newsletter">
        <span>Newsletter:</span>
        <input type="text" placeholder="Enter Email Here" required>
        <input type="submit">
    </div>
</div>
</div>
</div>
</body>
</html>