<?php
require_once '../autoload.php';

use Controllers\SignUpController;

// Inicializimi i kontrolluesit
$signUpController = new SignUpController();

// Përpunimi i kërkesës POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $result = $signUpController->handleSignUp($_POST);
    if ($result['success']) {
        $successMessage = $result['message'];
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="../styles/signup.css">
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
        <li><a href="LogIn.php">Log In</a></li>
    </ul>
</header>

<div class="container">
    <div class="container-2">
        <h1>Sign Up</h1>
        <?php if (isset($successMessage)): ?>
            <p style="color: green;"><?php echo $successMessage; ?></p>
        <?php elseif (isset($errorMessage)): ?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="input-group">
                <input type="text" class="input-field" placeholder="Username" name="username" required>
                <input type="password" class="input-field" placeholder="Password" name="password" required>
                <input type="email" class="input-field" placeholder="Email" name="email" required>
                <p>Already have an account? <a href="LogIn.php">Log In</a></p>
                <button type="submit" class="submit-btn">Sign Up</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
