<?php
class OrderFulfillModel {
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
                o.status = 'Pending'
            ";

            $getpaymentDetails = $this->conn->prepare($query);
            $getpaymentDetails -> execute();

            return $getpaymentDetails -> fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            error_log("Failed fetching payment details".$e->getMessage());
            return[];
        }
    }



    public function updateOrderStatus($data) {
        try {
            $query = "
                UPDATE orderr
                SET status = 'Fulfilled'
                WHERE orderID = :orderID
            ";
            $stmt = $this->conn->prepare($query);
            return $stmt->execute([':orderID' => $data['orderID']]);
        } catch (PDOException $e) {
            error_log("Update Order Status Error: " . $e->getMessage());
            return false;
        }
    }
}


?>