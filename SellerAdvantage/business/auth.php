<?php
session_start();

function authenticateUser() {
    if (!isset($_SESSION['user_id'])) {
        header("location: LogIn.php");
        exit();
    }

    // Check user type for authorization (optional)
    if ($_SESSION['usertype'] == "admin" && basename($_SERVER['PHP_SELF']) != "AdminDashboard.php") {
        header("location: AdminDashboard.php");
        exit();
    }
}

// Call this function at the beginning of pages where authentication is required
authenticateUser();
?>
