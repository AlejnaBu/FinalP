<?php

namespace Business;

use Data\UserRepository;

class UserManager {
    private $userRepository;

    /**
     * Konstruktor
     * @param UserRepository $userRepository Instanca e UserRepository për të kryer operacionet e bazës së të dhënave.
     */
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    /**
     * Krijon një përdorues të ri
     * @param string $username Emri i përdoruesit
     * @param string $password Fjalëkalimi
     * @param string $email Adresa e email-it
     * @return bool True nëse krijimi ka sukses, përndryshe false
     */
    public function createUser($username, $password, $email) {
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
     * @return bool True nëse fshirja ka sukses, përndryshe false
     */
    public function deleteUser($userId) {
        return $this->userRepository->removeUser($userId);
    }

    /**
     * Përditëson një përdorues ekzistues
     * @param int $userId ID e përdoruesit
     * @param string $newUsername Emri i ri i përdoruesit
     * @param string $newPassword Fjalëkalimi i ri
     * @param string $newEmail Email-i i ri
     * @return bool True nëse përditësimi ka sukses, përndryshe false
     */
    public function updateUser($userId, $newUsername, $newPassword, $newEmail) {
        return $this->userRepository->updateUser($userId, $newUsername, $newPassword, $newEmail);
    }

    /**
     * Merr detajet e një përdoruesi bazuar në ID
     * @param int $userId ID e përdoruesit
     * @return array|null Detajet e përdoruesit ose null nëse nuk ekziston
     */
    public function getUserDetails($userId) {
        return $this->userRepository->getUserById($userId);
    }
}
?>
