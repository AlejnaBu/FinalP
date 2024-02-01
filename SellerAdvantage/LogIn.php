
<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "databaza";

session_start();

$data = new PDO("mysql:host=$host;dbname=$db", $username, $password);
$data->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $data->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['usertype'] = $row['usertype'];
    
        if ($_SESSION['usertype'] == "user") {
            header("location: FrontPage.php");
        } elseif ($_SESSION['usertype'] == "admin") {
            header("location: AdminDashboard.php");
        } else {
            echo "Username or password is incorrect";
        }
    } else {
        echo "Username or password is incorrect";
    }
}
?>


<!DOCTYPE html>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>


       body{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
       }

    

      header{
            display: flex;
            justify-content: space-between;
            width: 100%; 
           z-index: 1000; /* Bon qe pjesa e header me nejt ntop*/
            
        }
        header li{
          padding: 15px;
          margin-left: 15px;
          list-style-type: none;

       }
        header ul  {
        display: flex;
        justify-content: flex-end;
        font-size: 20px;

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
       text-align: center;
       }

       form p {
        font-size: 15px;
       }

       form p a {
        
        color: black;
       }

       .button-2 button{
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


    </style>
</head>
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
                    <input type="text" placeholder="username" name="username">
                 </div>
    
                 <div class="input-field">
                    <input type="password" placeholder="password" name="password">
                 </div>
                 <p>Don't have an account <a href="SignUp.php">Click Here</a></p>
                </div> 
                <div class="input-field">
                    <input type="submit" placeholder="submit" name="submit">
                 </div>
            </form>
        </div>
        
    </div>
  
</body>
</html>  