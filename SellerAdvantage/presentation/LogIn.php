<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$db = "databaza";

try {
    $data = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    $data->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (!empty($username) && !empty($password)) {
        $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $data->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['usertype'] = $row['usertype'];
            $_SESSION['login_time'] = time();

            if ($_SESSION['usertype'] == "user") {
                header("location: FrontPage.php");
                exit();
            } elseif ($_SESSION['usertype'] == "admin") {
                header("location: AdminDashboard.php");
                exit();
            }
        } else {
            echo '<script>alert("Invalid username or password!");</script>';
        }
    } else {
        echo '<script>alert("Please fill in all fields!");</script>';
    }
}

// Check for session expiration
if (isset($_SESSION['username']) && isset($_SESSION['login_time'])) {
    $expiration_time = $_SESSION['login_time'] + (1 * 60 * 60) + (30 * 60); // 1 hour and 30 minutes

    if (time() > $expiration_time) {
        session_unset();
        session_destroy();
        header("location: LogIn.php");
        exit();
    } else {
        $_SESSION['login_time'] = time();
    }
}

// Redirect if already logged in
if (isset($_SESSION['username'])) {
    header("location: FrontPage.php");
    exit();
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
