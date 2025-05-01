<?php

class PaymentDetailsModel {
    private $conn;
  

  
    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }


    public function paymentDetailsHandler($paymentID) {
       $paymentData =$this->getPaymentData($paymentID);

       return [
        'paymentDetails' => $paymentData
       ];
       
    }

    public function getPaymentData($paymentID){
        try {

            $query = "
            SELECT 
            s.endDate,
            p.created_at, p.paymentID, p.Amount,
            pl.planName, pl.type, pl.price,
            c.fname, c.lname, c.blk, c.lot, c.brgy, c.city, c.province, c.ZipCode, c.phoneNo, c.email  
            FROM payment p
            JOIN subscription s ON s.subscriptionID = p.subscriptionID
            JOIN plans pl ON pl.planID = s.planID
            JOIN customer c ON c.customerID = p.customerID
            WHERE p.paymentID = :paymentID
            ";

            $getpaymentDetails = $this->conn->prepare($query);
            $getpaymentDetails -> execute([
                ':paymentID' => $paymentID
            ]);

            return $getpaymentDetails -> fetch(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            error_log("Failed fetching payment details".$e->getMessage());
            return[];
        }

    }




}


?>