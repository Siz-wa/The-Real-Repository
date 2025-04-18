<?php
require_once "../config/Database.php";

class Customer{
    private $conn;


    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function getAllCustomers(){
          try {
            $stmt = $this->conn->prepare("SELECT * FROM customer");
            $stmt->execute();
    
            // Check if data is returned
            $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Optional: Add a var_dump to check if the query returns anything
            // var_dump($customers);
            // ✅ Check the output here
    
            return $customers;
    } catch (PDOException $e) {
        // Log or handle the error
        echo "Error: " . $e->getMessage();
        return [];
    }

    }




}
?>