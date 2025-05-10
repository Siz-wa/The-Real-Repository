<?php
class PaymentModel {
    protected $conn;
    public function __construct(){
        $this->conn = Database::getInstance()->getConnection();
    }

    public function paymentHandler($plan){
        $getPlandetails = $this->getPlan($plan);
        return [
            'plan' => $getPlandetails
        ];
    }

    public function getPlan($plan){
        try {

            $query ="SELECT * FROM plans where planName = :name";
            $getcat = $this->conn ->prepare($query);
            $getcat->execute([
                ':name' => $plan
            ]);

            return $getcat->fetch(PDO::FETCH_ASSOC);
           
        } catch (PDOException $e) {
            error_log("Failed fetching payment details".$e->getMessage());
            return[];
        }
    }

    public function pay($customerID,$price,$planID,$type){
        try {

            $query ="INSERT INTO payment (customerID,Amount,planID) VALUES(:customerID,:amount,:planID)";
            $pay= $this->conn->prepare($query);
            $pay->execute([
                ':customerID' => $customerID,
                ':amount' => $price,
                ':planID' => $planID
            ]);    
        
        } catch (PDOException $e) {
            return "Database error: " . $e->getMessage();
            
        }
}

public function subscribe($customerID, $type, $planID) {
    try {
        // Step 1: Check if the user already has an active subscription
        $checkQuery = "SELECT endDate FROM subscription WHERE userID = :userID AND endDate >= CURDATE()";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->execute([':userID' => $customerID]);
        $existing = $checkStmt->fetch(PDO::FETCH_ASSOC);

        // If the subscription is still active, block the subscription
        if ($existing) {
            $endDate = date('F j, Y', strtotime($existing['endDate']));
            return ['error' => 'Subscription still active until ' . $endDate];
        }

        // Step 2: Calculate the new end date
        if ($type === "Monthly") {
            $endDate = date('Y-m-d', strtotime('+1 month'));
        } else if ($type === "Quarterly") {
            $endDate = date('Y-m-d', strtotime('+3 months'));
        } else {
            $endDate = date('Y-m-d', strtotime('+1 year'));
        }

        // Step 3: Insert or update the subscription
        $query = "INSERT INTO subscription (userID, endDate, `status`, planID)
                  VALUES (:userID, :endDate, :statuss, :planID)
                  ON DUPLICATE KEY UPDATE
                      endDate = VALUES(endDate),
                      `status` = VALUES(`status`),
                      planID = VALUES(planID)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':userID'   => $customerID,
            ':endDate'  => $endDate,
            ':statuss'  => "Active",
            ':planID'   => $planID
        ]);

        return true;

    } catch (PDOException $e) {
        error_log("Failed saving subscription: " . $e->getMessage());
        return ['error' => 'Database error'];
    }
}


}
?>