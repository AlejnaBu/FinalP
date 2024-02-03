<?php
// cart.php

// Include the necessary files
require_once 'DbConnect.php';

// Start the session
session_start();

class Cart {
    private $db;

    public function __construct() {
        // Instantiate DbConnect class
        $this->db = new DbConnect();
    }

    public function getCartProducts() {
        // Check if the user is logged in
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            // Query to get cart products for the logged-in user from the database
            $query = "SELECT * FROM cart WHERE user_id = :user_id";
            $stmt = $this->db->getConnection()->prepare($query);
            $stmt->bindParam(':user_id', $userId);
            $stmt->execute();
            // Fetch the cart products
            $cartProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $cartProducts;
        } else {
            return false;
        }
    }
}

// Instantiate the Cart class
$cart = new Cart();
?>
