<?php 
require_once '../business/auth.php';
require_once '../data/dbConnect.php';
require_once '../business/UserManager.php';

session_start();

$dbConnect = new DbConnect();
$connection = $dbConnect->getConnection();

$auth = new Business\Auth($connection);
$auth->authenticateUser();

$userManager = new UserManager($dbConnect);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create_user"])) {
    $username = htmlspecialchars($_POST["new_username"]);
    $password = password_hash($_POST["new_password"], PASSWORD_BCRYPT); // Encrypt password
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
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    height: 100vh;
                }

                header {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    padding: 10px;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    background-color: #333;
                }

                header img {
                    height: 60px;
                }

                header ul {
                    list-style: none;
                    display: flex;
                    gap: 10px;
                }

                header li a {
                    text-decoration: none;
                    color: white;
                }

                form {
                    max-width: 300px;
                    padding: 20px;
                    background-color: #fff;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                }

                label {
                    display: block;
                    margin-bottom: 5px;
                }

                input {
                    width: 100%;
                    padding: 8px;
                    margin-bottom: 10px;
                    box-sizing: border-box;
                }

                input[type="submit"] {
                    background-color: #20B2AA;
                    color: white;
                    border: none;
                    padding: 10px;
                    cursor: pointer;
                    border-radius: 5px;
                }
            </style>
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
        <?php
    }
}

$dbConnect = new DbConnect();
$userManager = new UserManager($dbConnect);
$createUserPage = new CreateUserPage($userManager);

$createUserPage->handleUserCreation();
$createUserPage->render();
?>
