<?php
class ScheduleModel extends UsersModel {

    public function __construct(){
        parent::__construct();
    }
    
    public function scheduleHandler($customerID){

        $subsData = $this->getSubscriptionData($customerID);

        return[
            'subsData' => $subsData
        ];

    }

    public function findWeeklyOrder($customerID, $weekStart, $weekEnd){
        try {
            $query = "
            SELECT * 
            FROM orderr
            WHERE customerID = :customerID
            AND requiredDate BETWEEN :weekStart AND :weekEnd
            ";
    
            $getOrderData = $this->conn->prepare($query);
            $getOrderData->execute([
                ':customerID' => $customerID,
                ':weekStart' => $weekStart->format('Y-m-d'),
                ':weekEnd' => $weekEnd->format('Y-m-d')               
            ]);
    
            return $getOrderData->fetchAll(PDO::FETCH_ASSOC); // Return all rows as an array
        } catch (PDOException $e) {
            error_log("Failed fetching order data of the user: ".$e->getMessage());
            return []; // Return empty array in case of failure
        }
    }

    public function scheduleOrder($customerID,$orderDate){
        try {
           
            $query= "
            INSERT INTO orderr (customerID,requiredDate)
            VALUES (:customerID,:orderDate)
            ";

            $insertOrder = $this->conn->prepare($query);
            $insertOrder->execute([
                ':customerID' => $customerID,
                ':orderDate' => $orderDate
            ]);

            $OID = $this->conn->lastInsertId();

       

            return $OID;
           
        } catch (PDOException $e) {
            error_log("Failed fetching order data of the user: ".$e->getMessage());
            return ['error' => 'Database error'.$e->getMessage()]; // Return empty array in case of failure
        }

    }

    public function insert($productID,$OID){
         $query2 = "
            INSERT INTO order_product (orderID,productID) 
            VALUES (:orderID, :productID)
            ";
            $inserOrderProd = $this->conn->prepare($query2);
            $inserOrderProd->execute([
                ':orderID' => $OID,
                ':productID' => $productID
            ]);
    }

    


    

}
    

   

    


?>