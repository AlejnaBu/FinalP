<?php
require_once '../business/auth.php';
require_once '../data/DbConnect.php';
require_once '../business/UserManager.php';
require_once '../data/UserRepository.php';

use Data\DbConnect;
use Business\UserManager;
use Business\Auth;
use Data\UserRepository;

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
    <link rel="stylesheet" type="text/css" href="../style/createUser.css">
</head>
<body>
<header>
    <div class="headeri">
        <img src="../presentation/FrontImg.html/Logo.png" height="90px" alt="logo">
    </div>
    <ul>
        <li><a href="../presentation/adminDashboard.php">Dashboard</a></li>
        <li><a href="../presentation/LogIn.php">Log In</a></li>
        <li><a href="../presentation/LogOut.php">Log Out</a></li>
    </ul>
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

</body>
</html>
