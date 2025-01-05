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
 
    $username = htmlspecialchars(trim($_POST["username"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $messageContent = htmlspecialchars(trim($_POST["message"]));

    try {
       
        if (empty($username) || empty($email) || empty($messageContent)) {
            throw new Exception("All fields are required.");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format.");
        }

      
        $messageHandler->saveMessage($username, $email, $messageContent);
        echo '<script>alert("Message saved successfully.");</script>';
    } catch (Exception $e) {
        echo '<script>alert("' . $e->getMessage() . '");</script>';
    }
}

echo '<script>alert("Message saved successfully."); window.location.href = "Contact.php";</script>';
header("Location: Contact.php");
exit();
?>
