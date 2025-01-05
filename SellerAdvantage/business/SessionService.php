<?php

namespace Business;

class SessionService {
    public function startSession() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function isUserLoggedIn() {
        return isset($_SESSION['username']);
    }

    public function loginUser($username, $usertype) {
        $_SESSION['username'] = $username;
        $_SESSION['usertype'] = $usertype;
        $_SESSION['login_time'] = time();
    }

    public function redirectBasedOnRole() {
        if ($_SESSION['usertype'] === "admin") {
            header("Location: AdminDashboard.php");
        } else {
            header("Location: FrontPage.php");
        }
        exit();
    }

    public function logoutUser() {
        session_unset();
        session_destroy();
    }

    public function isSessionExpired() {
        if (isset($_SESSION['login_time'])) {
            $expiration_time = $_SESSION['login_time'] + (1 * 60 * 60) + (30 * 60);
            return time() > $expiration_time;
        }
        return false;
    }
}
