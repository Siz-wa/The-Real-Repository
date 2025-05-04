<?php

class PlansModel{
    protected $conn;

    public function __construct(){
        $this->conn = Database::getInstance()->getConnection(); // singleton call
    }

    public function plansHandler(){
        $planss = $this->getPlans();

        return [
            'plans' => $planss
        ];
    }

    public function getPlans(){
        try {

            $query ="SELECT * FROM plans";
            $getplans = $this->conn ->prepare($query);
            $getplans->execute();

            return $getplans->fetchAll(PDO::FETCH_ASSOC);
           
        } catch (PDOException $e) {
            error_log("Failed fetching plans details".$e->getMessage());
            return[];
        }
    }

    public function addPlans($data) {
        try {
           
    
            $sql = "INSERT INTO plans (planName,`description`,price, `type`) VALUES (:planName, :dsc, :price, :tp)";
            $stmt = $this->conn->prepare($sql);
            $result =$stmt->execute([
                ':planName' => $data['name'],
                ':dsc' => $data['email'],
                ':price' => $data['phone'],
                ':tp' => $data['location']
            ]);

            return $result;
    
            
        } catch (PDOException $e) {
            error_log('Insert Error: ' . $e->getMessage());
            echo json_encode("Error:".$e->getMessage());
            return false;
        }
    }

    public function updatePlans($data){
        try {
         
            $sql = "UPDATE plans SET planName = :planName, `description` = :dsc, `type` = :tp, price = :price WHERE planID = :id";
            $stmt = $this->conn->prepare($sql);
            
            return $stmt->execute([
                ':planName' => $data['name'],
                ':dsc' => $data['email'],
                ':price' => $data['phone'],
                ':tp' => $data['location'],
                ':id' => $data['id']
            ]);
        } catch (PDOException $e) {
            error_log('Update Error: ' . $e->getMessage());
            echo json_encode('message:'. $e->getMessage());
            return false;
        }
    }
    
    public function deletePlans($data) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM plans WHERE planID = :id");
            $stmt->bindParam(':id', $data);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Delete failed: " . $e->getMessage());
            echo json_encode('message:'. $e->getMessage());
            return false;
        }
    }

    
}
?>