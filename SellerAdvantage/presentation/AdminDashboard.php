<?php
session_start();

// Përfshirjet e nevojshme
require_once '../data/DbConnect.php';
require_once '../data/UserRepository.php';
require_once '../business/UserManager.php';
require_once '../business/Auth.php';

use Data\DbConnect;
use Data\UserRepository;
use Business\UserManager;
use Business\Auth;

// Inicializo komponentët
$dbConnect = DbConnect::getInstance();
$connection = $dbConnect->getConnection();

$userRepository = new UserRepository($connection);
$userManager = new UserManager($userRepository);
$auth = new Auth($userRepository);

// Kontrollo autentikimin e përdoruesit
if (!isset($_SESSION['username']) || !isset($_SESSION['usertype']) || $_SESSION['usertype'] !== 'admin') {
    header("Location: LogIn.php");
    exit();
}

// Merr të gjithë përdoruesit
$users = $userManager->getAllUsers();
if (!is_array($users)) {
    $users = [];
}

// Menaxho kërkesat POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        // Krijo staf të ri
        if (isset($_POST["create_staff"])) {
            $name = htmlspecialchars($_POST["name"]);
            $experiences = htmlspecialchars($_POST["experiences"]);

            $sql = "INSERT INTO staff (name, experiences) VALUES (?, ?)";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$name, $experiences]);

            echo '<script>alert("Staff member added successfully.");</script>';
        }

        // Krijo përdorues të ri
        if (isset($_POST["create_user"])) {
            $username = htmlspecialchars($_POST["new_username"]);
            $password = htmlspecialchars($_POST["new_password"]);
            $email = htmlspecialchars($_POST["new_email"]);

            $userManager->createUser($username, $password, $email);
            echo '<script>alert("User created successfully.");</script>';
        }

        // Fshi përdoruesin
        if (isset($_POST["delete_user"])) {
            $userId = intval($_POST["delete_user_id"]);
            $userManager->deleteUser($userId);
            echo '<script>alert("User deleted successfully.");</script>';
        }

        // Përditëso përdoruesin
        if (isset($_POST["update_user"])) {
            $userId = intval($_POST["update_user_id"]);
            $userDetails = $userManager->getUserDetails($userId);

            if ($userDetails) {
                $_SESSION['update_user'] = $userDetails;
            } else {
                echo '<script>alert("Error fetching user details.");</script>';
            }
        }

        // Konfirmo përditësimin e përdoruesit
        if (isset($_POST["confirm_update"])) {
            $userId = intval($_POST["user_id"]);
            $newUsername = htmlspecialchars($_POST["update_username"]);
            $newPassword = htmlspecialchars($_POST["update_password"]);
            $newEmail = htmlspecialchars($_POST["update_email"]);

            $userManager->updateUser($userId, $newUsername, $newPassword, $newEmail);
            unset($_SESSION['update_user']);
            echo '<script>alert("User updated successfully.");</script>';
        }
    } catch (Exception $e) {
        echo '<script>alert("An error occurred: ' . $e->getMessage() . '");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../styles/adminDashboard.css?v=4">
</head>
<body>

<header>
    <div class="header-logo">
        <img src="../FrontImg.html/Logo.png" alt="Logo" height="90">
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

<h1>Welcome, Admin!</h1>

<section class="add-staff">
    <h2>Add New Staff Member</h2>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="experiences">Experiences:</label>
        <input type="text" id="experiences" name="experiences" required><br>

        <input type="submit" name="create_staff" value="Add Staff Member">
    </form>
</section>

<div class="actions">
    <a href="../presentation/CreateUser.php" class="button">Create User</a>
    <a href="../presentation/adminMessages.php" class="button">Get Messages</a>
</div>

<div class="div">
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Usertype</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['id']); ?></td>
                <td><?= htmlspecialchars($user['username']); ?></td>
                <td><?= htmlspecialchars($user['password']); ?></td>
                <td><?= htmlspecialchars($user['usertype']); ?></td>
                <td><?= htmlspecialchars($user['email']); ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="delete_user_id" value="<?= $user['id']; ?>">
                        <button type="submit" name="delete_user" class="delete-btn">Delete</button>
                    </form>
                    <form action="" method="post">
                        <input type="hidden" name="update_user_id" value="<?= $user['id']; ?>">
                        <button type="submit" name="update_user" class="update-btn">Update</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<footer>
    <p>&copy; 2025 Your Company Name. All rights reserved.</p>
</footer>
</body>
</html>
