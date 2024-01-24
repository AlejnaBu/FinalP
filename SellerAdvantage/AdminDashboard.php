<?php
session_start();

// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$db = "databaza";

// Establish database connection
$data = mysqli_connect($host, $username, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the users table
$sql = "SELECT * FROM users";
$result = mysqli_query($data, $sql);

if (!$result) {
    die("SQL query failed: " . mysqli_error($data));
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
            margin: 0;  /*Per me eliminu default space*/
            padding: 0;
            background-color: rgb(243, 243, 228);
           
            
        }
        /* Kodi per Header */

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
        if (mysqli_num_rows($result) > 0) {
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
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
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
    <?php } else {
            echo "No records found.";
        }
    } else {
        echo "Error: Result set is null.";
    }
    ?>

    <p><a href="logout.php">Logout</a></p>

</body>
</html>