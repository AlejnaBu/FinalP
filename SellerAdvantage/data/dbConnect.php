<?php
class DbConnect {
    private $conn;

    public function __construct() {
        $this->conn = null;
        $this->host = 'localhost';
        $this->dbname = 'databaza'; // Update to your database name
        $this->username = 'root';
        $this->password = '';
    }

    public function getConnection() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $pdoe) {
            die("Cannot connect to the database: " . $pdoe->getMessage());
        }
        return $this->conn;
    }
}
?>
