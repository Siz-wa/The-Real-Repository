<?php
class AssignDeliveryModel {
    private $conn;
    public function __construct(){
        $this->conn = Database::getInstance()->getConnection();
    }
    public function assignDelivery(){
        $delivery = $this->getDelivery();

        return[
            'delivery' => $delivery
        ];
    }
    public function getDelivery(){
        try {

            $query = "
            SELECT *
            FROM orderr o
            JOIN customer c ON c.customerID = o.customerID
            JOIN order_product op ON op.orderID = o.orderID
            JOIN product p ON p.productID = op.productID
            WHERE
                o.status = 'Fulfilled'
            ";

            $getpaymentDetails = $this->conn->prepare($query);
            $getpaymentDetails -> execute();

            return $getpaymentDetails -> fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            error_log("Failed fetching payment details".$e->getMessage());
            return[];
        }
    }

    public function insertDelivery($data) {
    try {
        $query = "
            INSERT INTO delivery (employeeID, orderID, CustomerID)
            VALUES (:employeeID, :orderID, :CustomerID)
        ";
        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ':employeeID' => $data['employeeID'],
            ':orderID'    => $data['orderID'],
            ':CustomerID' => $data['CustomerID'],
        ]);
    } catch (PDOException $e) {
        error_log("Insert Delivery Error: " . $e->getMessage());
        error_log("Failed Data: " . json_encode($data));
        return false;
    }
}

    public function updateOrderStatus($orderID) {
        try {
            $query = "
                UPDATE orderr
                SET status = 'Out for Delivery'
                WHERE orderID = :orderID
            ";
            $stmt = $this->conn->prepare($query);
            return $stmt->execute([':orderID' => $orderID]);
        } catch (PDOException $e) {
            error_log("Update Order Status Error: " . $e->getMessage());
            return false;
        }
    }
}


?>