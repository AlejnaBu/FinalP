<?php

include 'MessageHandler.php';
include 'DbConnect.php';

$dbConnect = new DbConnect();
$data = $dbConnect->getConnection();

$messageHandler = new MessageHandler($data); // Use $data instead of $db

// Get messages
$messages = $messageHandler->getMessages();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Messages</title>
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #20B2AA;
            color: white;
        }
    </style>
</head>
<body>

<h2>Admin Messages</h2>

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
            <td><?php echo $message['message']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
