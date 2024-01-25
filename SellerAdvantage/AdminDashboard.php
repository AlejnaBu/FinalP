 <?php

session_start();

include 'dbConnect.php';

$dbConnect = new dbConnect();
$data = $dbConnect->connectDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
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
}




$sql = "SELECT * FROM users";
$result = $data->query($sql);

if (!$result) {
    die("SQL query failed: " . $data->errorInfo()[2]);
}


// DELETE - Delete a user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_user"])) {
    $user_id = $_POST["delete_user_id"];

    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $data->prepare($sql);

    if ($stmt->execute([$user_id])) {
        echo '<script>alert("User deleted successfully");</script>';
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}

$sql = "SELECT * FROM users";
$result = $data->query($sql);

if (!$result) {
    die("SQL query failed: " . $data->errorInfo()[2]);
}

?>



?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }

        header{
            display: flex;
            justify-content: space-between;
        }

        header li{
            margin-left: 7px;
            list-style-type: none;
        }

        header ul  {
            display: flex;
            justify-content: flex-end;
        }

        .create{
            margin-left:10px;
        }

   
    </style>
</head>
<body>  

<header>
    <div class="headeri">
        <img src="FrontImg.html/Logo.png" height="90px" alt="logo" >
    </div>
    <ul>
        <li><a style="text-decoration: none; color: black;" href="FrontPage.php">Home</a></li>
        <li><a style="text-decoration: none; color: black;" href="SignUp.php"></a>SignUp</li>
        <li><a style="text-decoration: none; color: black;" href="ContactUs.php">Contact</a></li>
        <li><a style="text-decoration: none; color: black;" href="LogIn.php">Log in</a></li>
    </ul>
</header>

<h1>Welcome, Admin!</h1>







<?php
// Additional debugging statements
echo "Result set: " . var_export($result, true) . "<br>";

// Check if $result is not null
if ($result !== null) {
    // Check if there are rows in the result set
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) > 0) {
        ?>
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
            <?php foreach ($rows as $row) { ?>
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
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php
    } else {
        echo "No records found.";
    }
} else {
    echo "Error: Result set is null.";
}
?>

<div class="create">
    <h2>Create a New User</h2>
    <form action="" method="post">
        <label for="new_username"></label>
        <input style="padding:5px; margin-bottom: 5px;" type="text" id="new_username" name="new_username"
               placeholder="Username" required><br>

        <label for="new_password"></label>
        <input style="padding:5px; margin-bottom: 5px;" type="password" id="new_password" name="new_password"
               placeholder="Password" required><br>

        <label for="new_email"></label>
        <input style="padding:5px; margin-bottom: 5px;" type="email" id="new_email" name="new_email"
               placeholder="Email" required><br>

        <input type="submit" name="create_user" value="Create User">
    </form>
</div>

<p><a href="logout.php">Logout</a></p>

</body>
</html>