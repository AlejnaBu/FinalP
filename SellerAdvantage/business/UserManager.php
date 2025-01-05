<?php

namespace Business;

use Data\UserRepository;

class UserManager {
    private $userRepository;

    /**
     * Konstruktor
     * @param UserRepository $userRepository Instanca e UserRepository për operacionet e bazës së të dhënave.
     */
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    /**
     * Krijon një përdorues të ri
     * @param string $username Emri i përdoruesit
     * @param string $password Fjalëkalimi
     * @param string $email Adresa e email-it
     * @return bool True nëse krijimi ka sukses, false përndryshe
     */
    public function createUser($username, $password, $email) {
        if (empty($username) || empty($password) || empty($email)) {
            throw new \InvalidArgumentException("All fields are required.");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Invalid email format.");
        }
        return $this->userRepository->insertUser($username, $password, $email);
    }

    /**
     * Merr të gjithë përdoruesit
     * @return array Lista e përdoruesve
     */
    public function getAllUsers() {
        return $this->userRepository->fetchAllUsers();
    }

    /**
     * Fshin një përdorues bazuar në ID
     * @param int $userId ID e përdoruesit
     * @return bool True nëse fshirja ka sukses, false përndryshe
     */
    public function deleteUser($userId) {
        if (!is_numeric($userId)) {
            throw new \InvalidArgumentException("Invalid user ID.");
        }
        return $this->userRepository->removeUser($userId);
    }

    /**
     * Përditëson një përdorues ekzistues
     * @param int $userId ID e përdoruesit
     * @param string $newUsername Emri i ri i përdoruesit
     * @param string $newPassword Fjalëkalimi i ri
     * @param string $newEmail Email-i i ri
     * @return bool True nëse përditësimi ka sukses, false përndryshe
     */
    public function updateUser($userId, $newUsername, $newPassword, $newEmail) {
        if (!is_numeric($userId)) {
            throw new \InvalidArgumentException("Invalid user ID.");
        }
        if (empty($newUsername) || empty($newEmail)) {
            throw new \InvalidArgumentException("Username and email cannot be empty.");
        }
        if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Invalid email format.");
        }
        return $this->userRepository->updateUser($userId, $newUsername, $newPassword, $newEmail);
    }

    /**
     * Merr detajet e një përdoruesi bazuar në ID
     * @param int $userId ID e përdoruesit
     * @return array|null Detajet e përdoruesit ose null nëse nuk ekziston
     */
    public function getUserDetails($userId) {
        if (!is_numeric($userId)) {
            throw new \InvalidArgumentException("Invalid user ID.");
        }
        return $this->userRepository->getUserById($userId);
    }
}
?>
