<?php
class GendersModel{
    private $conn;
    public function __construct(){
        $this->conn = Database::getInstance()->getConnection();
    }

    public function genderTableHandler(){
        $gendersData = $this->getGenders();

        return [
            'gendersData' => $gendersData
        ];
    }

    public function getGenders(){
        try{
            $query = "
            SELECT 
                COALESCE(NULLIF(sex, 'Prefer not to say'), 'Unspecified') AS genders,
                COUNT(*) AS totalCustomers,
                ROUND((COUNT(*) / (SELECT COUNT(*) FROM customer)) * 100, 2) AS genderPercentage
            FROM 
                customer
            GROUP BY 
                COALESCE(NULLIF(sex, 'Prefer not to say'), 'Unspecified')
            ORDER BY 
                totalCustomers DESC;
        ";

            $getGenders = $this->conn->prepare($query);
            $getGenders -> execute();
            return $getGenders -> fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            error_log("Failed fetching city data.".$e->getMessage());
            return[];
        }
    }
}
?>