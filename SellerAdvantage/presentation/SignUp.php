<?php
// /presentation/SignUp.php

require_once '../business/UserManager.php';
require_once '../data/DbConnect.php';

use Business\UserManager;
use Data\DbConnect;

$dbConnect = new DbConnect();
$userManager = new UserManager($dbConnect);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $userManager->createUser($username, $password, $email);
        echo '<script>alert("User created successfully.");</script>';
    } catch (Exception $e) {
        echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        /* Add your CSS styling here */
    </style>
</head>
<body>
    <div class="container">
        <form action="#" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <input type="submit" value="Sign Up">
        </form>
    </div>
</body>
</html>
