<?php
namespace Data;

use PDO;
use PDOException;

class DbConnect {
    private static $instance = null; 
    private $connection; 

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbName = "databaza";

    
    private function __construct() {
        try {
       
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new DbConnect();
        }
        return self::$instance;
    }

    
    public function getConnection() {
        return $this->connection;
    }

    private function __clone() {}

    
    private function __wakeup() {}
}
