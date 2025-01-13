<?php

namespace Business;

class User {
    protected $username;
    protected $email;

    public function __construct($username, $email) {
        $this->username = $username;
        $this->email = $email;
    }

    public function getDetails() {
        return "User: $this->username, Email: $this->email";
    }
}

class Admin extends User {
    public function getDetails() {
        return "Admin: $this->username, Email: $this->email";
    }
}

class UserFactory {
    public static function createUser($role, $username, $email) {
        if ($role === 'admin') {
            return new Admin($username, $email);
        } elseif ($role === 'user') {
            return new User($username, $email);
        } else {
            throw new \Exception("Invalid role specified");
        }
    }
}
