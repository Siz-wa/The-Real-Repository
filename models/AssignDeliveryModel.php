<?php
class AssignDeliveryModel {
    private $conn;
    public function __construct(){
        $this->conn = Database::getInstance()->getConnection();
    }

    public function getDelivery(){
        try {

            $query = "
            SELECT
            FROM delivery d
            JOIN employee e ON e.employeeID = d.employeeID
            JOIN customer c ON c.customerID = d.customerID
            JOIN orderr o ON o.orderID = d.orderID
            
            ";

            $getpaymentDetails = $this->conn->prepare($query);
            $getpaymentDetails -> execute();

            return $getpaymentDetails -> fetch(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            error_log("Failed fetching payment details".$e->getMessage());
            return[];
        }
    }
}
?>