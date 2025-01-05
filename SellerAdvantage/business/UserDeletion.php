<?php

class UserDeletion
{
    private $data;

    public function __construct(PDO $data)
    {
        $this->data = $data;
    }

    public function deleteUser($userId)
    {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $this->data->prepare($sql);

        if ($stmt->execute([$userId])) {
            echo '<script>alert("User deleted successfully");</script>';
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }
}
?>
