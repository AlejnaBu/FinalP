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

$loginController = new LoginController($auth, $sessionService);

if ($sessionService->isUserLoggedIn()) {
    $sessionService->redirectBasedOnRole();
    exit();
}

$error = null;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $auth->authenticate($username, $password);
    if ($user) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['usertype'] = $user['usertype'];
        $sessionService->redirectBasedOnRole();
    } else {
        $error = "Invalid username or password.";
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
            <?php if ($error): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
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
