<?php

session_start();
include 'dbConnect.php'; 
include 'UserManager.php'; 

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
                  padding: 10px; /* Adjust padding as needed */
                  display: flex;
                  justify-content: space-between;
                  align-items: center;
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


                /* h1 {
                    color: #20B2AA;
                    text-align: top;
                } */

                form {
                    max-width: 300px;
                    padding: 20px;
                    background-color: #fff;
                   
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
                    background-color: #DED887;
                    color: white;
                    border: none;
                    padding: 8px;
                    cursor: pointer;
                    width: 100%;
                }
                </style>
        </head>
        <body>
        <header>
    <div class="headeri">
        <img src="FrontImg.html/Logo.png" height="90px" alt="logo" >
    </div>
    <ul>
        <li><a style="text-decoration: none; color: black;" href="adminDashboard.php">Dashboard</a></li>
        <li><a style="text-decoration: none; color: black;" href="LogIn.php">Log In</a></li>
        <li><a style="text-decoration: none; color: black;" href="LogOut.php">Log Out</a></li>
    </ul>
</header>
            <!-- <h1>Create a New User</h1><br> -->

            <form action="" method="post">
                <label for="new_username">Username:</label>
                <input type="text" id="new_username" name="new_username" required><br>

                <label for="new_password">Password:</label>
                <input type="password" id="new_password" name="new_password" required><br>

                <label for="new_email">Email:</label>
                <input type="email" id="new_email" name="new_email" required><br>

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
