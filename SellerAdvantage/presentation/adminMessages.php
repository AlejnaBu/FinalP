<?php
session_start();
require_once '../autoload.php';

use Business\MessageHandler;
use Data\MessageRepository;

// Kontrollo nëse përdoruesi është admin
if (!isset($_SESSION['usertype']) || $_SESSION['usertype'] !== 'admin') {
    header("Location: LogIn.php");
    exit();
}

// Krijimi i instancës së MessageHandler
$messageRepository = new MessageRepository();
$messageHandler = new MessageHandler($messageRepository);

// Merr mesazhet nga baza e të dhënave
$messages = $messageHandler->getMessages();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Messages</title>
    <link rel="stylesheet" type="text/css" href="../styles/adminMessages.css?v=4">

</head>
<body>
<header>
    <div class="header-logo">
        <img src="../FrontImg.html/Logo.png" alt="Logo">
    </div>
    <nav>
        <ul>
            <li><a href="adminDashboard.php">Dashboard</a></li>
            <li><a href="LogIn.php">Log In</a></li>
            <li><a href="LogOut.php">Log Out</a></li>
        </ul>
    </nav>
</header>

<div class="messages-container">
    <h1>Admin - Messages</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $message): ?>
                <tr>
                    <td><?= htmlspecialchars($message['id']); ?></td>
                    <td><?= htmlspecialchars($message['username']); ?></td>
                    <td><?= htmlspecialchars($message['email']); ?></td>
                    <td><?= htmlspecialchars($message['messages']); ?></td> <!-- Sigurohu që kolonat janë të sakta -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
