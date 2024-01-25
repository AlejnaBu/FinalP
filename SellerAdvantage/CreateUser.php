<?php
include 'dbConnect.php';

$dbConnect = new dbConnect();
$data = $dbConnect->connectDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

    if (mysqli_query($data, $sql)) {
        // Handle success
        echo "User registration successful";
    } else {
        // Handle error
        echo "Error: " . $sql . "<br>" . mysqli_error($data);
    }
}
?>
