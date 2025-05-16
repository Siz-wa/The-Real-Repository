<?php
class DeliverModel{
    private $conn;
    public function __construct(){
        $this->conn = Database::getInstance()->getConnection();
    }

    public function deliverHandler($employeeID){
        $delivery = $this->getDelivery($employeeID);
        return [
            'delivery' => $delivery
        ];
    }

    public function getEmpID($userID){
        $get = $this -> conn ->prepare("SELECT employeeID FROM employee WHERE userID = :empID");
        $get->execute([
            ':empID' => $userID
        ]);

        return $get->fetch(PDO::FETCH_ASSOC);
    }
    public function getDelivery($employeeID){
        try {

            $query = " SELECT * 
    FROM delivery d
    JOIN orderr o ON d.orderID = o.orderID
    JOIN order_product op ON op.orderID = o.orderID
    JOIN product p ON p.productID = op.productID
    JOIN customer c ON c.customerID = d.customerID
    WHERE d.employeeID = :employeeID;
            ";

            $getpaymentDetails = $this->conn->prepare($query);
            $getpaymentDetails -> execute([
                ':employeeID' => $employeeID
            ]);

            return $getpaymentDetails -> fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            error_log("Failed fetching details".$e->getMessage());
            return[];
        }
    }

   
}
?>