<?php

class ServiceModel{
    protected $conn;
    private $error = [];

    public function __construct(){
        $this->conn = Database::getInstance()->getConnection(); // singleton call
    }

    public function serviceHandler(){
        $plansData = $this->getPlans();

        return [
            'plansData' => $plansData
        ];
    }

    public function getPlans(){
        try {

            $query ="SELECT * FROM plans";
            $getplans = $this->conn ->prepare($query);
            $getplans->execute();

            return $getplans->fetchAll(PDO::FETCH_ASSOC);
           
        } catch (PDOException $e) {
            error_log("Failed fetching payment details".$e->getMessage());
            return[];
        }
    }
}
?>