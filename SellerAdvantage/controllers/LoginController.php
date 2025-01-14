<?php

namespace Controllers;

use Business\Auth;
use Business\SessionService;

class LoginController {
    private $auth;
    private $sessionService;

    public function __construct(Auth $auth, SessionService $sessionService) {
        $this->auth = $auth;
        $this->sessionService = $sessionService;
    }

    public function handleLogin($postData) {
        $username = trim($postData['username']);
        $password = trim($postData['password']);
    
        if (empty($username) || empty($password)) {
            return "Please fill in all fields!";
        }
    
        $user = $this->auth->authenticate($username, $password);
    
        if ($user) {
            $this->sessionService->loginUser($user['username'], $user['usertype']);
            $this->sessionService->redirectBasedOnRole();
        } else {
            return "Invalid username or password!";
        }
    
        return null;
    }
}
