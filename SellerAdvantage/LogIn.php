<?php


$host = "localhost";
$username = "root";
$password = "";
$db = "databaza";

session_start();

include 'dbConnect.php'; // Include the database connection file

$dbConnect = new dbConnect();
$data = $dbConnect->connectDB();

$data = mysqli_connect($host, $username, $password, $db);

if ($data == false) {
    die("Connection failed");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($data, $sql);

    if (!$result) {
        die("SQL query failed: " . mysqli_error($data));
    }

    $row = mysqli_fetch_array($result);

    if ($row) { // Check if a matching user is found
        // After successful login
        $_SESSION['username'] = $row['username'];
        $_SESSION['usertype'] = $row['usertype'];

        // Redirect to the appropriate page
        if ($row['usertype'] === 'admin') {
            header("location: AdminDashboard.php");
        } else {
            header("location: FrontPage.php"); // or any other non-admin page
        }
    } else {
        echo "username or password is incorrect";
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

    <div class="container">
        <div class="container-2">
            <h1 id="title">Log In</h1>
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
