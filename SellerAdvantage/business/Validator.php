<?php
namespace Business;

class Validator {
    public static function validateEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("Invalid email format.");
        }
    }

    public static function validatePassword($password) {
        if (strlen($password) < 6) {
            throw new \Exception("Password must be at least 6 characters.");
        }
    }
}

?>
