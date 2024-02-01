<?php

class UserUpdate
{
    private $data;

    public function __construct(PDO $data)
    {
        $this->data = $data;
    }

    public function getUserDetails($userId)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->data->prepare($sql);

        if ($stmt->execute([$userId])) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            echo "Error fetching user details for update: " . $stmt->errorInfo()[2];
            return null;
        }
    }

    public function updateUser($userId, $newUsername, $newPassword, $newEmail)
    {
        $sql = "UPDATE users SET username = ?, password = ?, email = ? WHERE id = ?";
        $stmt = $this->data->prepare($sql);

        if ($stmt->execute([$newUsername, $newPassword, $newEmail, $userId])) {
            echo '<script>alert("User updated successfully");</script>';
        } else {
            echo "Error updating user: " . $stmt->errorInfo()[2];
        }
    }
}
