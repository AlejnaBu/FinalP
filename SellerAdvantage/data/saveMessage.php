<?php
require_once '../data/DbConnect.php';
require_once '../data/MessageRepository.php';
require_once '../business/MessageHandler.php';

use Data\DbConnect;
use Data\MessageRepository;
use Business\MessageHandler;

// Krijimi i lidhjes me bazën e të dhënave dhe instancave të nevojshme
$dbConnect = new DbConnect();
$connection = $dbConnect->getConnection();

$messageRepository = new MessageRepository($connection);
$messageHandler = new MessageHandler($messageRepository);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitizimi i të dhënave të formularit
    $username = htmlspecialchars(trim($_POST["username"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $messageContent = htmlspecialchars(trim($_POST["message"]));

    // Validimi bazik
    if (empty($username) || empty($email) || empty($messageContent)) {
        echo '<script>alert("All fields are required.");</script>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Invalid email format.");</script>';
    } else {
        // Ruajtja e mesazhit
        $result = $messageHandler->saveMessage($username, $email, $messageContent);

        if ($result) {
            echo '<script>alert("Message saved successfully.");</script>';
        } else {
            echo '<script>alert("Failed to save the message. Please try again.");</script>';
        }
    }
}

// Riekzekutimi në faqen `Contact.php`
header("Location: Contact.php");
exit();
?>
