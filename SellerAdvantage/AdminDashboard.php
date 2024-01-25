<?php

session_start();

include 'dbConnect.php';

$dbConnect = new dbConnect();
$data = $dbConnect->connectDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is submitted for user creation
    if (isset($_POST["create_user"])) {
        $username = $_POST["new_username"];
        $password = $_POST["new_password"];
        $email = $_POST["new_email"];

        // Use prepared statement to prevent SQL injection
        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        $stmt = $data->prepare($sql);

        if ($stmt->execute([$username, $password, $email])) {
            // Handle success
            echo '<script>alert("User registration successful");</script>';
        } else {
            // Handle error
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }
}

// Fetch data from the users table using PDO
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

        input{
        text-decoration: none; 
        color: black;
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
        <table border="1">
            <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Usertype</th>
                <th>Email</th>
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
    <input style="padding:5px; margin-bottom: 5px;"; type="text" id="new_username" name="new_username" placeholder="Userame" required><br>

    <label for="new_password"></label>
    <input style="padding:5px; margin-bottom: 5px;"; type="password" id="new_password" name="new_password" placeholder="Password" required><br>

    <label for="new_email"></label>
    <input style="padding:5px; margin-bottom: 5px;"; type="email" id="new_email" name="new_email" placeholder="Email" required><br>

    <input type="submit" name="create_user" value="Create User">
</form>
</div>


<p><a href="logout.php">Logout</a></p>

</body>
</html>