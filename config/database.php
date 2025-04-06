<?php
// filepath: c:\xampp\htdocs\chabongshop\config\database.php
// Database connection

class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'chabong_shop';
    private $conn;

    public function __construct() {
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
            
            if ($this->conn->connect_error) {
                throw new Exception('Connection failed: ' . $this->conn->connect_error);
            }
            
            $this->conn->set_charset("utf8mb4");
        } catch (Exception $e) {
            echo 'Database Connection Error: ' . $e->getMessage();
            exit;
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}