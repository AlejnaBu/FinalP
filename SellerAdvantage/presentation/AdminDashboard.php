<?php

session_start();

// Përshijmë klasën Auth për autentikim
require_once '../business/auth.php';
use Business\Auth;

// Krijojmë instancën e klasës Auth dhe kontrollojmë autentikimin
$auth = new Auth();
$auth->authenticateUser();

// Përshijmë klasat nga shtresa e të dhënave dhe biznesit
require_once '../data/DbConnect.php';
require_once '../business/UserDeletion.php';
require_once '../business/UserUpdate.php';

$dbConnect = new DbConnect();
$data = $dbConnect->getConnection();

// Krijojmë instancat e klasave për menaxhimin e përdoruesve
$userDeletion = new UserDeletion($data);
$userUpdate = new UserUpdate($data);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["create_staff"])) {
        $name = $_POST["name"];
        $experiences = $_POST["experiences"];

        $sql = "INSERT INTO staff (name, experiences) VALUES (?, ?)";
        $stmt = $data->prepare($sql);

        if ($stmt->execute([$name, $experiences])) {
            echo '<script>alert("Staff member added successfully");</script>';
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }

    if (isset($_POST["create_user"])) {
        $username = $_POST["new_username"];
        $password = $_POST["new_password"];
        $email = $_POST["new_email"];

        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        $stmt = $data->prepare($sql);

        if ($stmt->execute([$username, $password, $email])) {
            echo '<script>alert("User registration successful");</script>';
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }

    if (isset($_POST["delete_user"])) {
        $userDeletion->deleteUser($_POST["delete_user_id"]);
    }

    if (isset($_POST["update_user"])) {
        $user_id = $_POST["update_user_id"];
        $userDetails = $userUpdate->getUserDetails($user_id);

        if ($userDetails !== null) {
            ?>
            <div class="update">
                <h2>Update User</h2>
                <form action="" method="post">
                    <input type="hidden" name="user_id" value="<?= $userDetails['id']; ?>">

                    <label for="update_username">Username:</label>
                    <input type="text" id="update_username" name="update_username" placeholder="Username"
                           value="<?= $userDetails['username']; ?>" required><br>

                    <label for="update_password">New Password (leave blank to keep current):</label>
                    <input type="password" id="update_password" name="update_password" placeholder="New Password"><br>

                    <label for="update_email">Email:</label>
                    <input type="email" id="update_email" name="update_email" placeholder="Email"
                           value="<?= $userDetails['email']; ?>" required><br>

                    <input type="hidden" name="update_action" value="confirm_update">

                    <input type="submit" style="background-color: #FFD700; border: none; padding-top: 5px; padding-bottom: 5px;"
                           name="confirm_update" value="Update User">
                </form>
            </div>
            <?php
        } else {
            echo "Error fetching user details for update.";
        }
    }

    if (isset($_POST["update_action"]) && $_POST["update_action"] == "confirm_update") {
        $user_id = $_POST["user_id"];
        $new_username = $_POST["update_username"];
        $new_password = $_POST["update_password"];
        $new_email = $_POST["update_email"];

        $userUpdate->updateUser($user_id, $new_username, $new_password, $new_email);
    }
}

$sql = "SELECT * FROM users";
$result = $data->query($sql);

if (!$result) {
    die("SQL query failed: " . $data->errorInfo()[2]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Përfshi skedarë CSS ose ndryshime në rrugë këtu -->
</head>
<body>

<header>
    <div class="headeri">
        <img src="../presentation/FrontImg.html/Logo.png" height="90px" alt="logo">
    </div>
    <ul>
        <li><a style="text-decoration: none; color: black;" href="../presentation/FrontPage.php">Home</a></li>
        <li><a style="text-decoration: none; color: black;" href="../presentation/SignUp.php">Sign Up</a></li>
        <li><a style="text-decoration: none; color: black;" href="../presentation/contact.php">Contact</a></li>
        <li><a style="text-decoration: none; color: black;" href="../presentation/LogIn.php">Log in</a></li>
    </ul>
</header>

<h1 style="color: orange;">Welcome, Admin!</h1>

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

<p><a style="text-decoration:none;color:black;margin-left:20px;" href="../presentation/CreateUser.php">Create User</a></p>
<p><a style="text-decoration:none;color:black;margin-left:20px;" href="../presentation/adminMessages.php">Get Messages</a></p>

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
        <?php foreach ($result as $row): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['username']; ?></td>
                <td><?= $row['password']; ?></td>
                <td><?= $row['usertype']; ?></td>
                <td><?= $row['email']; ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="delete_user_id" value="<?= $row['id']; ?>">
                        <button type="submit" name="delete_user" class="delete-btn">Delete</button>
                    </form>
                    <form action="" method="post">
                        <input type="hidden" name="update_user_id" value="<?= $row['id']; ?>">
                        <button type="submit" name="update_user" class="update-btn">Update</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
