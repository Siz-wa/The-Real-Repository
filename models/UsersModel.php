<?php
class UsersModel {
    private $conn;

    public function __construct(){
        $this->conn = Database::getInstance()->getConnection();
    }

    public function UsersHandler($customerID){
        $userData = $this->getUserData($customerID);
        $orderData = $this->getOrderData($customerID);
        $subsData = $this->getSubscriptionData($customerID);
        $paymentData = $this->getPaymentHistory($customerID);
        return [
            'userInfo' => $userData,
            'orderData' => $orderData,
            'subsData' => $subsData,
            'paymentData' => $paymentData
        ];
    }

    public function getPaymentHistory($customerID){
        try {
            $query = "
            SELECT * FROM payment
            WHERE customerID = :customerID
            ORDER BY created_at DESC 
            ";

            $getPaymentData = $this->conn->prepare($query);
            $getPaymentData ->execute([':customerID' => $customerID]);

            return $getPaymentData->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Failed fetching payment history".$e->getMessage());
            return[];
        }
    }

    public function getSubscriptionData($customerID){
        try {
            $query = "
            SELECT 
            s.endDate, s.status, 
            p.planName, p.type, p.description, p.price 
            FROM subscription s
            JOIN plans p ON p.planID = s.planID
            WHERE s.userID = :customerID
            ";

            $getSubsData = $this->conn->prepare($query);
            $getSubsData ->execute([':customerID' => $customerID]);

            return $getSubsData->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Failed fetching subscription info".$e->getMessage());
            return[];
        }
    }

    public function getOrderData($customerID){
        try {
            $query = "
            SELECT * FROM orderr
            WHERE customerID = :customerID
            ";

            $getOrderData = $this->conn->prepare($query);
            $getOrderData->execute([
                ':customerID' => $customerID
            ]);

            return $getOrderData ->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Failed fetching order data of the user".$e->getMessage());
            return[];
        }
    }

    public function getUserData($customerID){
        try {
           $query ="
           SELECT * FROM customer
           WHERE customerID = :customerID
           ";
           $getUserData = $this->conn->prepare($query);
           $getUserData -> execute([
            ':customerID' => $customerID
           ]);

           return $getUserData->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Failed fetching user data".$e->getMessage());
            return[];
        }
    }

}
?>