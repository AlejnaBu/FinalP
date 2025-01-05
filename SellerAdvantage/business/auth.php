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

        // Kontrollo nëse përdoruesi ekziston dhe nëse fjalëkalimi përputhet
        if ($user && $password === $user['password']) {
            return $user; // Kthe të dhënat e përdoruesit nëse autentikimi ka sukses
        }

        return false; // Kthe false nëse autentikimi dështoi
    }

    public function authenticateUser() {
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: LogIn.php");
            exit();
        }
    }
}

