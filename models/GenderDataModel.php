<?php
class GenderDataModel{
    private $conn;

    public function __construct(){
        $this->conn = Database::getInstance()->getConnection();
    }

    public function genderDataHandler($gender){

        $genderData = $this->getCityDataGender($gender);
        $ageGroupData = $this->getCityAgeGroup($gender);
        $monthlyCitySpendingpData = $this->getMonthlySpendingByGender($gender);
        $cityUsersData = $this->getCityUsers($gender);
        
        return[
            'monthCitySpending' =>$monthlyCitySpendingpData,
            'ageGroupData' => $ageGroupData,
            'genderData' => $genderData,
            'cityUserData' => $cityUsersData
        ];
    }

    public function getCityUsers($gender){
        try{
            $query ="
            SELECT * 
            FROM customer
            WHERE sex = :gender
            ";

            $cityUsers = $this->conn->prepare($query);
            $cityUsers->execute([
                ':gender' => $gender
            ]);

            return $cityUsers->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            error_log("Error fetching city users!".$e->getMessage());
            return[];
        }
    }

    public function getCityAgeGroup($gender){
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
            ROUND((COUNT(*) / (SELECT COUNT(*) FROM customer WHERE sex = :gender)) * 100, 2) AS ageGroupPercentage
            FROM 
                customer
            WHERE
                sex = :gender
            GROUP BY 
                ageGroup;"
             ;
            $ageGroup = $this->conn->prepare($query);
            $ageGroup->execute([':gender'=> $gender]);

            return $ageGroup->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            error_log("Error fetching gender percentage!".$e->getMessage());
            return[];
        }
    }

    public function getMonthlySpendingByGender($gender){
        try{
            $query = "
            SELECT 
                MONTH(p.created_at) AS month,
                SUM(p.Amount) AS total
            FROM 
                payment p
            JOIN 
                customer c ON p.customerID = c.customerID
            WHERE 
                YEAR(p.created_at) = :currentYear
                AND (c.sex = :gender OR (:gender = 'Others' AND (c.city IS NULL OR c.city = '')))
            GROUP BY 
                MONTH(p.created_at)
            ORDER BY 
                MONTH(p.created_at)
        ";
    
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':currentYear' => date('Y'),
            ':gender' => $gender
        ]);
    
        
    
        $monthlyData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Fill in missing months with 0
            $result = array_fill(1, 12, 0);
            foreach ($monthlyData as $row) {
                $result[(int)$row['month']] = (float)$row['total'];
            }
    
            return array_values($result);

        }catch(PDOException $e){
            error_log("Failed fetching montly city spending".$e->getMessage());
            return[];
        }


    }
    

    public function getCityDataGender($cityName){
        try{
            $query = "
            SELECT 
                CASE 
                    WHEN sex = 'Male' THEN 'Male'
                    WHEN sex = 'Female' THEN 'Female'
                    ELSE 'Others'
                END AS gender, 
                COUNT(*) AS genderCount,
                ROUND((COUNT(*) / 
                    (SELECT COUNT(*) FROM customer WHERE city = :city)
                ) * 100, 2) AS percentage
            FROM 
                customer
            WHERE city = :city    
            GROUP BY 
                gender  
            ";
            $genderPercent = $this->conn->prepare($query);
            $genderPercent->execute([':city'=> $cityName]);

            return $genderPercent->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            error_log("Error fetching gender percentage!".$e->getMessage());
            return[];
        }
    }
}
?>