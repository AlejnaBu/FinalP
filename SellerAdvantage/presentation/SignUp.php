<?php
require_once '../data/DbConnect.php';
require_once '../business/UserManager.php';

$dbConnect = new DbConnect();
$userManager = new UserManager($dbConnect);

$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $username = htmlspecialchars(trim($_POST["username"]));
        $password = htmlspecialchars(trim($_POST["password"]));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format.");
        }
        if (strlen($password) < 6) {
            throw new Exception("Password must be at least 6 characters.");
        }

        $userManager->createUser($username, password_hash($password, PASSWORD_BCRYPT), $email);

        echo '<script>alert("User created successfully.");</script>';
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
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
    <div class="container">
        <h2>Sign Up</h2>
        <?php if ($errorMessage): ?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
        <form action="" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <input type="submit" value="Sign Up">
        </form>
    </div>
</body>
</html>
