<?php
class UserManager {
    private $db;

    public function __construct(DbConnect $dbConnect) {
        $this->db = $dbConnect->getConnection();
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        $result = $this->db->query($sql);

        if (!$result) {
            die("SQL query failed: " . $this->db->errorInfo()[2]);
        }

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createUser($username, $password, $email) {
        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);

        if ($stmt->execute([$username, $password, $email])) {
            return true;
        } else {
            return "Error: " . $stmt->errorInfo()[2];
        }
    }

    public function deleteUser($userId) {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $this->db->prepare($sql);

        if ($stmt->execute([$userId])) {
            return true;
        } else {
            return "Error: " . $stmt->errorInfo()[2];
        }
    }

    public function updateUser($userId, $newUsername, $newPassword, $newEmail) {
        $sql = "UPDATE users SET username = ?, password = ?, email = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);

        if ($stmt->execute([$newUsername, $newPassword, $newEmail, $userId])) {
            return true;
        } else {
            return "Error updating user: " . $stmt->errorInfo()[2];
        }
    }

    // Add more methods as needed for your specific requirements

    // For example:
    public function getUserDetails($userId) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->db->prepare($sql);

        if ($stmt->execute([$userId])) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return "Error fetching user details: " . $stmt->errorInfo()[2];
        }
    }
}
?>
       
