<?php
session_start();

include 'DbConnect.php'; // Include the database connection file

$dbConnect = new DbConnect();
$data = $dbConnect->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
    $stmt = $data->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        $cookie_name = "registration_success";
        $cookie_value = "true";
        setcookie($cookie_name, $cookie_value, time() + 3600, "/"); // Expires in 1 hour

        echo '<script>alert("User registration successful");</script>';
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>


body{
 margin: 0;
 padding: 0;
 box-sizing: border-box;
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

    
    @media only screen and (max-width: 320px) {
    header {
        position: static;
        flex-direction: column;
        align-items: center;
    }

    .headeri img {
        height: 40px;
        margin-bottom: 10px;
    }

    header ul {
        margin-top: 10px;
    }

    header li {
        margin: 5px 0;
    }
}
 
 .container{
     width: 100%;
     height: 100vh;
     background-image: url(FrontImg.html/bg.webp);
     
     background-position: center;
     background-size: cover;
     position: relative;
     padding: 50px 50px 70px;
     text-align: center;
     position: fixed;
 }

.container h1{
 font-size: 40px;
 margin-bottom: 60px;
}

input{
padding: 18px 15px;
margin-top: 5px;
}

form p {
 font-size: 15px;
}

form p a {
 
 color: black;
}

.button-2{
 background-color: rgb(155, 215, 155);
 width: 100px;
 padding-top: 10px;
 padding-bottom: 10px;
 border-radius: 5px;
 border: 0;
 outline: 0;
}

.input-group{
 height: 280px;
}

.input-field{
 max-height: 65px;
 transition: max-height 0.5s;
 overflow: hidden;
}

.container-2{
background-color: gray;
border-radius: 20px;
width: 500px;
margin-left: 500px;
opacity: 0.7;
padding-top: 10px;
padding-bottom: 20px;
}

@media only screen and (max-width: 768px) {
.container {
 padding: 20px;
}

.container-2 {
 width: 100%;
 margin-left: 0;
}

.input-group {
 height: auto;
}

.input-field {
 max-height: none;
}
}

input{
    text-align:center;
}


</style>
<body>
<header>
            <div class="headeri">
                <img src="FrontImg.html/Logo.png" height="90px" alt="logo" >
            </div>
            <ul>
                <li><a style="text-decoration: none; color: black;" href="FrontPage.php">Home</a></li>
                <li><a style="text-decoration: none; color: black;" href="AboutUs.php">AboutUs</a></li>
                <li><a style="text-decoration: none; color: black;" href="contact.php">Contact</a></li>
                <li><a style="text-decoration: none; color: black;" href="LogIn.php">Log in</a></li>
                <li><a style="text-decoration: none; color: black;" href="LogOut.php">Log Out</a></li>
            </ul>
        </header>

<div class="container">
        <div class="container-2">
            <h1 id="title">Sign Up</h1>
            <form action="#" method="POST">
               <div class="input-group">
                <div class="input-field" id="nameField">
                </div>

                <div class="input-field">
                    <!-- <label>user Name</label> -->
                    <input type="text" placeholder="username" name="username">
                 </div> <br>

                 <div class="input-field">
                    <!-- <label>Password</label> -->
                    <input type="password" placeholder="password" name="password">
                 </div> <br>

                 <div class="input-field">
                    <!-- <label>Email</label> -->
                    <input type="text" placeholder="email" name="email">
                 </div> <br>

                 <p>Already have an account <a href="LogIn.php">Click Here</a></p> <br>
                 
                </div> 
                <div class="input-field">
                    <input  type="submit" placeholder="submit" name="submit">
                 </div>
            </form>
        </div>
        
    </div>
</body>
</html>