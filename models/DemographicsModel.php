<?php
class DemographicsModel{
    private $conn;
    public function __construct(){
        $this->conn = Database::getInstance()->getConnection();
    }

    public function demographicsHandler(){

        $genderPercent = $this->getGender();
        $ageGroupPercentage = $this->getAgePercentage();
        $topCities = $this->getTopCities();

        return[
            'ageGroupPercentage' => $ageGroupPercentage,
            'genderData' => $genderPercent,
            'topCities' => $topCities
        ];

    }

    public function getAgePercentage(){
        try{
            $query ="
            SELECT 
            CASE 
                WHEN TIMESTAMPDIFF(YEAR, bDay, CURDATE()) BETWEEN 0 AND 12 THEN 'Child (0-12)'
                WHEN TIMESTAMPDIFF(YEAR, bDay, CURDATE()) BETWEEN 13 AND 19 THEN 'Teenager (13-19)'
                WHEN TIMESTAMPDIFF(YEAR, bDay, CURDATE()) BETWEEN 20 AND 35 THEN 'Young Adult (20-35)'
                WHEN TIMESTAMPDIFF(YEAR, bDay, CURDATE()) BETWEEN 36 AND 55 THEN 'Adult (36-55)'
                ELSE 'Others' 
            END AS ageGroup,
            COUNT(*) AS groupCount,
            ROUND((COUNT(*) / (SELECT COUNT(*) FROM customer)) * 100, 2) AS ageGroupPercentage
            FROM 
                customer
            GROUP BY 
                ageGroup;"
             ;

             $getAgeGroupData = $this->conn->prepare($query);
             $getAgeGroupData ->execute();

             return $getAgeGroupData->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            error_log("Failed fetching the percentage of age groups".$e->getMessage());
            return[];
        }
    }

    public function getTopCities() {
        try {
            $query = "
                        WITH top_cities AS (
                SELECT city
                FROM customer
                WHERE city IS NOT NULL AND city != ''
                GROUP BY city
                ORDER BY COUNT(*) DESC
                LIMIT 5
            )
            SELECT 
                city_final.city,
                COUNT(*) AS cityCount,
                ROUND((COUNT(*) / (SELECT COUNT(*) FROM customer)) * 100, 2) AS cityPercentage
            FROM (
                SELECT 
                    CASE 
                        WHEN city IN (SELECT city FROM top_cities) THEN city
                        ELSE 'Others'
                    END AS city
                FROM customer
            ) AS city_final
            GROUP BY city_final.city
            ORDER BY 
                CASE WHEN city_final.city = 'Others' THEN 1 ELSE 0 END,
                cityCount DESC;
            ";
    
            $getTopCities = $this->conn->prepare($query);
            $getTopCities->execute();
    
            return $getTopCities->fetchAll(PDO::FETCH_ASSOC);
    
        } catch(PDOException $e) {
            error_log('Failed fetching the top cities: '.$e->getMessage());
            return [];
        }
    }
    

    // Fetches percentage of genders
    public function getGender(){
        try{
            $query = "
            SELECT 
                CASE 
                    WHEN sex = 'Male' THEN 'Male'
                    WHEN sex = 'Female' THEN 'Female'
                    ELSE 'Others'
                END AS gender, 
                COUNT(*) AS genderCount,
                ROUND((COUNT(*) / (SELECT COUNT(*) FROM customer)) * 100, 2) AS percentage
            FROM 
                customer
            GROUP BY 
                gender;    
            ";
            $genderPercent = $this->conn->prepare($query);
            $genderPercent->execute();

            return $genderPercent->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            error_log("Error fetching gender percentage!".$e->getMessage());
            return[];
        }
    }
}
?>