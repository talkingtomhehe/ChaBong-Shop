<?php
class Database {
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct() {
        // Get credentials from environment variables
        $this->host = getenv('DB_HOST') ?: 'localhost';
        $this->username = getenv('DB_USER') ?: 'root';
        $this->password = getenv('DB_PASS') ?: '';
        $this->dbname = getenv('DB_NAME') ?: 'chabong_shop';
        
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
            
            if ($this->conn->connect_error) {
                throw new Exception('Connection failed: ' . $this->conn->connect_error);
            }
            
            $this->conn->set_charset("utf8mb4");
        } catch (Exception $e) {
            error_log('Database Connection Error: ' . $e->getMessage());
            die('Database connection failed. Check error logs for details.');
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}