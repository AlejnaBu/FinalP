<?php
require_once '../data/dbConnect.php';
require_once '../business/auth.php';

use Business\Auth;
use Data\DbConnect;

// Establish a database connection
$dbConnect = new DbConnect();
$connection = $dbConnect->getConnection();

// Instantiate the Auth class with the database connection
$auth = new Auth($connection);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    // Authenticate user
    $user = $auth->authenticate($username, $password, $connection);

    if ($user) {
        // Set session variables on successful login
        session_start();
        $_SESSION['username'] = $user['username'];
        $_SESSION['usertype'] = $user['usertype'];
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['login_time'] = time();

        // Redirect based on user type
        if ($user['usertype'] === "admin") {
            header("Location: AdminDashboard.php");
        } else {
            header("Location: FrontPage.php");
        }
        exit();
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
    <meta name="description" content="Log In to your account">
    <meta name="author" content="Your Company Name">
    <title>Log In | Furniture Shop</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url("../FrontImg.html/bg.webp");
            background-size: cover;
            background-position: center;
            color: #333;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: rgba(255, 255, 255, 0.9);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        header .headeri img {
            height: 70px;
        }

        header ul {
            list-style: none;
            display: flex;
            gap: 15px;
            margin: 0;
            padding: 0;
        }

        header li {
            display: inline;
        }

        header a {
            text-decoration: none;
            color: black;
            font-size: 16px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .container-2 {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            text-align: center;
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .input-field {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }

        .input-field:focus {
            outline: none;
            border-color: #007BFF;
        }

        .input-group p {
            text-align: center;
            font-size: 14px;
            margin-top: 10px;
        }

        .input-group p a {
            color: #007BFF;
            text-decoration: none;
        }

        .input-group p a:hover {
            text-decoration: underline;
        }

        .submit-btn {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #218838;
        }
    </style>
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
        <li><a href="LogOut.php">Log Out</a></li>
    </ul>
</header>

<div class="container">
    <div class="container-2">
        <h1>Log In</h1>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="input-group">
                <input type="text" class="input-field" placeholder="Username" name="username" required>
                <input type="password" class="input-field" placeholder="Password" name="password" required>
                <p>Don't have an account? <a href="SignUp.php">Sign Up</a></p>
                <button type="submit" class="submit-btn">Log In</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
