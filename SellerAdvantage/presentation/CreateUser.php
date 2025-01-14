<?php
require_once '../business/auth.php';
require_once '../data/DbConnect.php';
require_once '../business/UserManager.php';
require_once '../data/UserRepository.php';

use Data\DbConnect;
use Business\UserManager;
use Business\Auth;

$dbConnect = DbConnect::getInstance(); // Singleton Pattern
$connection = $dbConnect->getConnection();

$auth = new Auth(new Data\UserRepository($connection));
$auth->authenticateUser();

$userManager = new UserManager(new Data\UserRepository($connection));

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create_user"])) {
    $username = htmlspecialchars($_POST["new_username"]);
    $password = $_POST["new_password"]; // Pa hashing të fjalëkalimit
    $email = filter_var($_POST["new_email"], FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color:red;'>Invalid email format.</p>";
        return;
    }

    $result = $userManager->createUser($username, $password, $email);

    if ($result === true) {
        echo '<script>alert("User registration successful");</script>';
    } else {
        echo "<p style='color:red;'>Error creating user: {$result}</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" type="text/css" href="../styles/createUser.css?v=1.1">

</head>
<body>
<header>
    <div class="header-logo">
        <img src="../FrontImg.html/Logo.png" alt="Logo" height="60">
    </div>
    <nav>
        <ul>
            <li><a href="FrontPage.php">Home</a></li>
            <li><a href="AboutUs.php" class="active">About Us</a></li>
            <li><a href="contact.php">Contact</a></li>
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="LogOut.php">Log Out</a></li>
            <?php else: ?>
                <li><a href="LogIn.php">Log In</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<form action="" method="post">
    <h2>Create a New User</h2>

    <label for="new_username">Username:</label>
    <input type="text" id="new_username" name="new_username" required>

    <label for="new_password">Password:</label>
    <input type="password" id="new_password" name="new_password" required>

    <label for="new_email">Email:</label>
    <input type="email" id="new_email" name="new_email" required>

    <input type="submit" name="create_user" value="Create User">
</form>

<footer>
    <p>&copy; 2025 Your Company Name. All rights reserved.</p>
</footer>
</body>
</html>
