<?php
namespace Business;

use PDO;

class Auth {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function authenticate($username, $password, $connection) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Krahasimi me plaintext password
        if ($user && $password === $user['password']) {
            return $user;
        } else {
            return false;
        }
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