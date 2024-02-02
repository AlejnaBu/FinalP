<?php

session_start();



if (!isset($_SESSION['username']) || $_SESSION['usertype'] !== 'admin') {
    header("location: LogIn.php");
    exit();
}

include 'dbConnect.php';
include 'UserDeletion.php';
include 'UserUpdate.php';

$dbConnect = new DbConnect();
$data = $dbConnect->getConnection();

// Create instances of UserDeletion and UserUpdate classes
$userDeletion = new UserDeletion($data);
$userUpdate = new UserUpdate($data);



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

    $sql = "SELECT * FROM users";
    $result = $data->query($sql);

    if (!$result) {
        die("SQL query failed: " . $data->errorInfo()[2]);
    }

    // DELETE - Delete a user
    if (isset($_POST["delete_user"])) {
       $userDeletion->deleteUser($_POST["delete_user_id"]);
     }

    // Handle Update Form Submission
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
            <input type="text" id="update_username" name="update_username" placeholder="Username" value="<?= $userDetails['username']; ?>" required><br>

            <label for="update_password">New Password (leave blank to keep current):</label>
            <input type="password" id="update_password" name="update_password" placeholder="New Password"><br>

            <label for="update_email">Email:</label>
            <input type="email" id="update_email" name="update_email" placeholder="Email" value="<?= $userDetails['email']; ?>" required><br>

            <input type="submit" style="background-color: #FFD700; border: none; padding-top: 5px; padding-bottom: 5px;" name="confirm_update" value="Update User">
        </form>
    </div>
<?php
    } else {
        echo "Error fetching user details for update.";
    }
}

    // Handle Confirm Update Form Submission
    // if (isset($_POST["confirm_update"])) {
    //     $user_id = $_POST["user_id"];
    //     $new_username = $_POST["update_username"];
    //     $new_password = $_POST["update_password"];
    //     $new_email = $_POST["update_email"];

    //     $sql = "UPDATE users SET username = ?, password = ?, email = ? WHERE id = ?";
    //     $stmt = $data->prepare($sql);

    //     if ($stmt->execute([$new_username, $new_password, $new_email, $user_id])) {
    //         echo '<script>alert("User updated successfully");</script>';
    //     } else {
    //         echo "Error updating user: " . $stmt->errorInfo()[2];
    //     }
    // }
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
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        header {
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         display: flex;
         justify-content: space-between;
         z-index: 1000;
         background-color: transparent; 
     }

      header .headeri {
         padding: 10px; 
     }

     header ul {
        display: flex;
        justify-content: flex-end;
        list-style-type: none;
        margin: 0;
        padding: 0;
        font-size:20px;
        margin-top: 10px;
     }

    header li {
        margin: 0 15px;
    }

    header a {
       text-decoration: none;
       color: black;
    }

        h1 {
            color: orange;
            margin-top: 20px;
        }

        .div {
            display: flex;
            margin-top: 20px;
        }

        table {
            width: 60%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-left:250px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color:  #DED887;
            color: white;
        }

        .update {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .update form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            padding: 8px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #FFD700;
            border: none;
            padding: 8px;
            cursor: pointer;
        }

        button.delete-btn,
        button.update-btn {
            background-color: #20B2AA;
            border: none;
            width: 60px;
            padding: 5px;
            cursor: pointer;
            color: white;
        }

        button.update-btn {
            background-color: #FFD700;
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
        <li><a style="text-decoration: none; color: black;" href="contact.php">Contact</a></li>
        <li><a style="text-decoration: none; color: black;" href="LogIn.php">Log in</a></li>
    </ul>
</header>

<h1 style=color:orange;;>Welcome, Admin!</h1>

<p><a style="text-decoration:none;color:black;margin-left:20px;" href="CreateUser.php">CreateUser</a></p>
<p><a style="text-decoration:none;color:black;margin-left:20px;" href="adminMessages.php">Get Messages</a></p>


<?php
// Additional debugging statements
echo "Result set: " . var_export($result, true) . "<br>";

// Check if $result is not null
if ($result !== null) {
    // Check if there are rows in the result set
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) > 0) {
        ?>
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
                            <button style="background-color:#DC143C; border:none; width:60px; padding-top:5px; padding-bottom:5px;" type="submit" name="delete_user" class="delete-btn">Delete</button>
                        </form>
                        <form action="" method="post">
                            <input type="hidden" name="update_user_id" value="<?= $row['id']; ?>">
                            <button style="background-color: #DED887; border: none; width: 60px; padding-top: 5px; padding-bottom: 5px;" type="submit" name="update_user" class="update-btn">Update</button>
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

<!-- <div class="create">
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

        <input style="background-color:#20B2AA;border:none;padding-top:5px;padding-bottom:5px;; type="submit" name="create_user" value="Create User">
    </form>
</div> -->

<!-- <p><a href="logout.php">Logout</a></p> -->


</body>
</html>
