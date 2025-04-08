<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'thcdb';
    private $username = 'root';
    private $password = '';
    public $db;


    public function connect() {
        $this->db = null;
        try {
            $this->db = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->db;
    }
}
?>