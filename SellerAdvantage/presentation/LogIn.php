<?php
session_start();

require_once '../data/DbConnect.php';
require_once '../data/UserRepository.php';
require_once '../business/Auth.php';
require_once '../business/SessionService.php';
require_once '../controllers/LoginController.php';

use Data\DbConnect;
use Data\UserRepository;
use Business\Auth;
use Business\SessionService;
use Controllers\LoginController;


$dbConnect = DbConnect::getInstance();
$connection = $dbConnect->getConnection();

$userRepository = new UserRepository($connection);
$auth = new Auth($userRepository);
$sessionService = new SessionService();

// Inicializo Controller-in
$loginController = new LoginController($auth, $sessionService);

// Nëse përdoruesi është tashmë i kyçur, ridrejtoje
if ($sessionService->isUserLoggedIn()) {
    $sessionService->redirectBasedOnRole();
    exit();
}

// Menaxho kërkesën POST për hyrje
$error = null;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $error = $loginController->handleLogin($_POST);
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
            <img src="FrontImg.html/Logo.png" height="50" alt="logo">
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
            <form action="" method="POST">
                <div class="input-group">
                    <input class="input-field" type="text" name="username" placeholder="Username" required>
                    <input class="input-field" type="password" name="password" placeholder="Password" required>
                    <input class="submit-btn" type="submit" value="Log In">
                </div>
            </form>
            <p>Don't have an account? <a href="SignUp.php">Sign Up</a></p>
        </div>
    </div>
</body>

</html>
