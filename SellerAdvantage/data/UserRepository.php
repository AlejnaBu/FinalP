<?php
namespace Data;

use PDO;

class UserRepository {
    private $db;

    public function __construct() {
        $this->db = DbConnect::getInstance()->getConnection();
    }

    public function insertUser($username, $password, $email) {
        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$username, $password, $email]);
    }

    public function fetchAllUsers() {
        $sql = "SELECT * FROM users";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function removeUser($userId) {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$userId]);
    }

    public function updateUser($userId, $newUsername, $newPassword, $newEmail) {
        $sql = "UPDATE users SET username = ?, password = ?, email = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$newUsername, $newPassword, $newEmail, $userId]);
    }

    public function getUserById($userId) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserByUsername($username) {
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->db->prepare($query); // Përdoret $this->db
        $stmt->execute([$username]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
?>
