<?php
namespace Business;

use PDO;

class MessageHandler {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function saveMessage($username, $email, $messageContent) {
        try {
            $sql = "INSERT INTO messages (username, email, messages) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$username, $email, $messageContent]);
        } catch (\Exception $e) {
            // Log the error or handle it appropriately
            return false;
        }
    }

    public function getMessages() {
        try {
            $sql = "SELECT * FROM messages";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            // Log the error or handle it appropriately
            return [];
        }
    }
}
?>
