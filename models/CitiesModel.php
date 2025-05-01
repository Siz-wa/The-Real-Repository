<?php
class CitiesModel{
    private $conn;
    public function __construct(){
        $this->conn = Database::getInstance()->getConnection();
    }

    public function cityTableHandler(){
        $cityData = $this->getCityData();

        return [
            'cityData' => $cityData
        ];
    }

    public function getCityData(){
        try{
            $query = "
            SELECT 
                COALESCE(NULLIF(city, ''), 'Users with undefined city') AS city,
                COUNT(*) AS totalCustomers,
                ROUND((COUNT(*) / (SELECT COUNT(*) FROM customer)) * 100, 2) AS cityPercentage
            FROM 
                customer
            GROUP BY 
                COALESCE(NULLIF(city, ''), 'Users with undefined city')
            ORDER BY 
                totalCustomers DESC
        ";

            $getCityData = $this->conn->prepare($query);
            $getCityData -> execute();
            return $getCityData -> fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            error_log("Failed fetching city data.".$e->getMessage());
            return[];
        }
    }
}
?>