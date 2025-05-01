<?php
class OrderDetailsModel {
    private $conn;
    public function __construct(){
        $this->conn = Database::getInstance()->getConnection();
    }

    public function orderDetailsHandler($orderID){
        $orderDetails = $this->getorderDetails($orderID);

        return [
            'orderDetails' => $orderDetails
        ];
    }

    public function getorderDetails($orderID){
        try {

            $query = "
            SELECT 
            c.brgy, c.blk, c.lot,c.city, c.province, c.ZipCode, c.fname, c.lname, c.email, c.phoneNo,
            o.orderID, o.created_at, o.requiredDate, o.status,
            p.productName, p.image,
            op.qty
            FROM orderr o
            JOIN customer c ON c.customerID = o.customerID
            JOIN order_product op ON op.orderID = o.orderID
            JOIN product p ON p.productID = op.productID
            WHERE o.orderID = :orderID
            ";

            $getOrderDet = $this->conn->prepare($query);
            $getOrderDet -> execute([
                ':orderID' => $orderID
            ]);

            return $getOrderDet -> fetch(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            error_log("Failed fetching order details".$e->getMessage());
            return[];
        }
    }
}
?>