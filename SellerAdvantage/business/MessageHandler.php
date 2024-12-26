<?php

class MessageHandler {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function saveMessage($username, $email, $messageContent) {
        $sql = "INSERT INTO messages (username, email, messages) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
    
        if ($stmt->execute([$username, $email, $messageContent])) {
            return true;
        } else {
            return false;
        }
    }

    public function getMessages() {
        $sql = "SELECT * FROM messages";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


