<?php
require_once '../data/DbConnect.php';
require_once '../data/MessageRepository.php';
require_once '../business/MessageHandler.php';

use Data\DbConnect;
use Data\MessageRepository;
use Business\MessageHandler;


$dbConnect = DbConnect::getInstance(); 
$connection = $dbConnect->getConnection();
$messageRepository = new MessageRepository($connection);
$messageHandler = new MessageHandler($messageRepository);


$messages = $messageHandler->getMessages();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Messages</title>
    <link rel="stylesheet" type="text/css" href="../css/adminMessages.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h2 {
            color: #20B2AA;
            text-align: center;
        }

        table {
            width: 80%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #DEB887;
            color: white;
        }

        .headeri img {
            display: block;
            margin: 20px auto;
        }

        ul {
            list-style: none;
            text-align: center;
            padding: 0;
            margin: 0;
        }

        ul li {
            display: inline;
            margin: 0 10px;
        }

        ul li a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="headeri">
        <img src="../FrontImg.html/Logo.png" height="90px" alt="logo">
    </div>
    <ul>
        <li><a style="text-decoration: none; color: black;" href="adminDashboard.php">Dashboard</a></li>
        <li><a style="text-decoration: none; color: black;" href="LogIn.php">Log In</a></li>
        <li><a style="text-decoration: none; color: black;" href="LogOut.php">Log Out</a></li>
    </ul>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Message</th>
        </tr>
        <?php foreach ($messages as $message) : ?>
            <tr>
                <td><?php echo $message['id']; ?></td>
                <td><?php echo $message['username']; ?></td>
                <td><?php echo $message['email']; ?></td>
                <td><?php echo $message['messages']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
