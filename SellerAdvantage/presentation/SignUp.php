<?php
require_once '../data/DbConnect.php';
require_once '../business/UserManager.php';

use Data\DbConnect;
use Business\UserManager;

// Krijimi i lidhjes me bazën e të dhënave
$dbConnect = new DbConnect();
$userManager = new UserManager($dbConnect);

$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $username = htmlspecialchars(trim($_POST["username"]));
        $password = htmlspecialchars(trim($_POST["password"]));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

        // Validimi i të dhënave
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format.");
        }
        if (strlen($password) < 6) {
            throw new Exception("Password must be at least 6 characters.");
        }

        // Krijimi i përdoruesit të ri
        $userManager->createUser($username, $password, $email);

        echo '<script>alert("User created successfully.");</script>';
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<head>

    <link rel="stylesheet" href="../styles/signup.css"> <!-- Path corrected for CSS -->
</head>
<html lang="en">
<header>
    <div class="headeri">
        <img src="../FrontImg.html/Logo.png" alt="Logo">
    </div>
    <ul>
        <li><a href="FrontPage.php">Home</a></li>
        <li><a href="AboutUs.php">About Us</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="LogIn.php">Log In</a></li>
        <li><a href="LogOut.php">Log Out</a></li>
    </ul>
</header>

<div class="container">
    <div class="container-2">
        <h1>Sign Up</h1>
        <?php if (isset($errorMessage)): ?>
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
