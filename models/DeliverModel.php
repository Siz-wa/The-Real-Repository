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


    public function getDelivery($employeeID){
        try {

            $query = "CALL GetAssignedDelivery(:employeeID)";

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