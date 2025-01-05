<?php
namespace Business;

use Data\UserRepository;

class UserManager {
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function createUser($username, $password, $email) {
        return $this->userRepository->insertUser($username, $password, $email);
    }

    public function getAllUsers() {
        return $this->userRepository->fetchAllUsers();
    }

    public function deleteUser($userId) {
        return $this->userRepository->removeUser($userId);
    }

    public function updateUser($userId, $newUsername, $newPassword, $newEmail) {
        return $this->userRepository->updateUser($userId, $newUsername, $newPassword, $newEmail);
    }

    public function getUserDetails($userId) {
        return $this->userRepository->getUserById($userId);
    }
}
