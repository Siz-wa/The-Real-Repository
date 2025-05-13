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
            o.orderID, o.created_at, o.requiredDate, o.status, d.POD,
            p.productName, p.image, p.qty_per_package
            FROM orderr o
            JOIN customer c ON c.customerID = o.customerID
            JOIN order_product op ON op.orderID = o.orderID
            JOIN product p ON p.productID = op.productID
            JOIN delivery d ON d.orderID = o.orderID
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

    public function verifyDeliverability($orderID){
         try {

            $query = "
            SELECT * FROM
            orderr 
            WHERE orderID = :orderID AND
            status != 'Out for Delivery'
            ";

            $getOrderDet = $this->conn->prepare($query);
            $getOrderDet -> execute([
                ':orderID' => $orderID
            ]);

            $existing = $getOrderDet->fetch(PDO::FETCH_ASSOC);

             if ($existing) {  
            return ['error' => 'Order has not been fulfilled yet. '];
            }

            return true;
      
        } catch (PDOException $e) {
            error_log("Failed fetching order details".$e->getMessage());
            return[];
        }
    }

    public function confirmDelivery($orderID,$POD,$deliveryID){
        try {
            $query = "
            UPDATE delivery SET POD = :POD
            WHERE DeliveryID = :DeliveryID
            ";

            $confirm = $this->conn->prepare($query);
            $confirm -> execute([
                ':POD' => $POD,
                ':DeliveryID' => $deliveryID
            ]);

            $query2 = "
            UPDATE orderr
            SET status = 'Deliverd'
            WHERE orderID = :orderID
            ";
            $confirm2 = $this->conn->prepare($query2);
            $confirm2 -> execute([
                ':orderID' => $orderID
            ]);
            return true;



           
    }catch (PDOException $e) {
            error_log("Failed ".$e->getMessage());
            return[];
        }
}
}
?>