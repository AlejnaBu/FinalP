<?php
session_start();

include 'DbConnect.php';
include 'MessageHandler.php'; // Include the MessageHandler class

$dbConnect = new DbConnect();
$data = $dbConnect->getConnection();

$messageHandler = new MessageHandler($data); // Pass $data (database connection) to MessageHandler

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $messageContent = $_POST["message"];

    if ($messageHandler->saveMessage($username, $email, $messageContent)) {
        echo '<script>alert("Message sent successfully");</script>';
    } else {
        echo "Error saving the message.";
    }
}

header("Location: Contact.php"); // Redirect back to the contact page
exit();
?>
