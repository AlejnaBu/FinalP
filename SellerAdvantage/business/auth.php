<?php
namespace Business;

use Data\UserRepository;

class Auth {
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function authenticate($username, $password) {
        $user = $this->userRepository->getUserByUsername($username);

        // Kontrollo fjalëkalimin pa hashing
        if ($user && $user['password'] === $password) {
            return $user;
        }
        return null;
    }

    public function authenticateUser() {
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: LogIn.php");
            exit();
        }
    }
}
?>
