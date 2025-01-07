<?php
namespace Controllers;

use Business\UserManager;
use Business\Validator;

class SignUpController {
    private $userManager;

    public function __construct() {
        $dbConnect = new \Data\DbConnect();
        $connection = $dbConnect->getConnection();
        $userRepository = new \Data\UserRepository($connection);
        $this->userManager = new UserManager($userRepository);
    }

    public function handleSignUp($data) {
        try {
            $username = htmlspecialchars(trim($data["username"]));
            $password = htmlspecialchars(trim($data["password"]));
            $email = filter_var(trim($data["email"]), FILTER_SANITIZE_EMAIL);

           
            Validator::validateEmail($email);
            Validator::validatePassword($password);

           
            $this->userManager->createUser($username, $password, $email);

            return ['success' => true, 'message' => 'User created successfully.'];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}
?>
