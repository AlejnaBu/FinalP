<?php
session_start();

require_once '../data/DbConnect.php';
require_once '../data/UserRepository.php';
require_once '../business/Auth.php';

use Data\DbConnect;
use Data\UserRepository;
use Business\Auth;

// Krijo lidhjen me bazën e të dhënave
$dbConnect = new DbConnect();
$connection = $dbConnect->getConnection();

// Inicializo UserRepository dhe Auth
$userRepository = new UserRepository($connection);
$auth = new Auth($userRepository);

// Verifiko nëse përdoruesi është tashmë i kyçur
if (isset($_SESSION['username'])) {
    header("location: FrontPage.php");
    exit();
}

// Kontrollo kërkesën POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (!empty($username) && !empty($password)) {
        $user = $auth->authenticate($username, $password);

        if ($user) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['usertype'] = $user['usertype'];
            $_SESSION['login_time'] = time();

            // Ridrejto bazuar në rolin e përdoruesit
            if ($_SESSION['usertype'] === "admin") {
                header("location: AdminDashboard.php");
            } else {
                header("location: FrontPage.php");
            }
            exit();
        } else {
            $error = "Invalid username or password!";
        }
    } else {
        $error = "Please fill in all fields!";
    }
}

// Kontrollo skadimin e sesionit
if (isset($_SESSION['login_time'])) {
    $expiration_time = $_SESSION['login_time'] + (1 * 60 * 60) + (30 * 60); // 1 orë e 30 minuta
    if (time() > $expiration_time) {
        session_unset();
        session_destroy();
        header("location: LogIn.php");
        exit();
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
