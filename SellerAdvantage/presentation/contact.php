<?php
require_once '../business/Auth.php'; // Përdorimi i klasës Auth
require_once '../data/dbConnect.php';
require_once '../business/MessageHandler.php';


use data\DbConnect; // Përdorimi i hapësirës së emrave për DbConnect
use business\Auth;
use business\MessageHandler;

// Krijimi i lidhjes me bazën e të dhënave
$dbConnect = new DbConnect();
$data = $dbConnect->getConnection();

// Krijimi i instancës Auth me lidhjen
$auth = new Business\Auth($data);

// Autentikimi i përdoruesit
$auth->authenticateUser();

$messageHandler = new MessageHandler($data);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST["username"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST["message"]));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Invalid email format.");</script>';
    } else {
        if ($messageHandler->saveMessage($username, $email, $message)) {
            echo '<script>alert("Message sent successfully!");</script>';
        } else {
            echo '<script>alert("Failed to send message. Try again.");</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            background-color: rgb(243, 243, 228);
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            background-color: transparent;
            z-index: 1000;
        }

        header ul {
            display: flex;
            justify-content: flex-end;
            list-style: none;
            padding: 0;
            margin: 10px;
        }

        header li {
            margin: 0 15px;
        }

        header a {
            text-decoration: none;
            color: black;
        }

        .contact-form {
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .contact-form button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .contact-form button:hover {
            background-color: #45a049;
        }
    </style>
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
