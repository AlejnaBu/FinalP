<?php
namespace Business;

use Data\MessageRepository;

class MessageHandler {
    private $messageRepository;

    public function __construct(MessageRepository $messageRepository) {
        $this->messageRepository = $messageRepository;
    }

    public function saveMessage($username, $email, $messageContent) {
        // Logjika e validimit mund të vendoset këtu nëse është e nevojshme
        return $this->messageRepository->saveMessage($username, $email, $messageContent);
    }

    public function getMessages() {
        return $this->messageRepository->getMessages();
    }
}
