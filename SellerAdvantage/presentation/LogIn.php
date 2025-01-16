<?php
session_start();

require_once '../autoload.php';

use Controllers\LoginController;

$loginController = new LoginController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $result = $loginController->handleLogin($_POST);
    if ($result['success']) {
        header("Location: adminDashboard.php");
        exit();
    } else {
        $errorMessage = $result['message'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="../styles/login.css">
</head>
<body>
<header>
    <div class="headeri">
        <img src="../FrontImg.html/Logo.png" alt="Logo">
    </div>
    <ul>
        <li><a href="FrontPage.php">Home</a></li>
        <li><a href="AboutUs.php">About Us</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="SignUp.php">Sign Up</a></li>
    </ul>
</header>

<div class="container">
    <div class="container-2">
        <h1>Log In</h1>
        <?php if (isset($errorMessage)): ?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="input-group">
                <input type="text" class="input-field" placeholder="Username" name="username" required>
                <input type="password" class="input-field" placeholder="Password" name="password" required>
                <button type="submit" class="submit-btn">Log In</button>
            </div>
        </form>
        <p>Don't have an account? <a href="SignUp.php">Sign Up</a></p>
    </div>
</div>
</body>
</html>
