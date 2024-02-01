<?php

session_start();
include 'dbConnect.php';  // Include your database connection file
include 'UserManager.php'; // Include your UserManager class file

class CreateUserPage
{
    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    public function handleUserCreation()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create_user"])) {
            $username = $_POST["new_username"];
            $password = $_POST["new_password"];
            $email = $_POST["new_email"];

            $result = $this->userManager->createUser($username, $password, $email);

            if ($result === true) {
                echo '<script>alert("User registration successful");</script>';
            } else {
                echo "Error creating user: " . $result;
            }
        }
    }

    public function render()
    {
        // Include any necessary CSS or JavaScript files here

        // HTML for the user creation form
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Create User</title>
            <!-- Add any necessary styles or scripts here -->
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

                h1 {
                    color: #20B2AA;
                    text-align: center;
                }

                form {
                    max-width: 300px;
                    padding: 20px;
                    background-color: #fff;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
                    padding: 8px;
                    cursor: pointer;
                    width: 100%;
                }
                </style>
        </head>
        <body>
            <h1>Create a New User</h1>

            <form action="" method="post">
                <label for="new_username">Username:</label>
                <input type="text" id="new_username" name="new_username" required><br>

                <label for="new_password">Password:</label>
                <input type="password" id="new_password" name="new_password" required><br>

                <label for="new_email">Email:</label>
                <input type="email" id="new_email" name="new_email" required><br>

                <input type="submit" name="create_user" value="Create User">
            </form>

            <!-- Add any additional HTML or content here -->

        </body>
        </html>
        <?php
    }
}

// Instantiate the UserManager and CreateUserPage
$dbConnect = new DbConnect();
$userManager = new UserManager($dbConnect);
$createUserPage = new CreateUserPage($userManager);

// Call methods to handle user creation and render the page
$createUserPage->handleUserCreation();
$createUserPage->render();

?>
