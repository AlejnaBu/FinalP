<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "databaza";

include 'dbConnect.php'; // Include the database connection file

session_start();

$dbConnect = new dbConnect();
$data = $dbConnect->connectDB();



$data = mysqli_connect($host, $username, $password, $db);

if ($data == false) {
    die("Connection failed");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    // $usertype = $_POST["usertype"];
    $email = $_POST["email"];

    

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

    if (mysqli_query($data, $sql)) {
        $cookie_name = "registration_success";
        $cookie_value = "true";
        setcookie($cookie_name, $cookie_value, time() + 3600, "/"); // Expires in 1 hour

        echo '<script>alert("User registration successful");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($data);
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


</style>
<body>
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