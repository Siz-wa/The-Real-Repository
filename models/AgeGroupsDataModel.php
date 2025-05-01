<?php
class AgeGroupsDataModel{
    private $conn;

    public function __construct(){
        $this->conn = Database::getInstance()->getConnection();
    }

    public function ageGroupHandler($ageGroup){

        $genderData = $this->getCityDataGender($ageGroup);
      
        $monthlyCitySpendingpData = $this->getMonthlySpendingByAgeGroup($ageGroup);
        $cityUsersData = $this->getCityUsers($ageGroup);
        
        return[
            'monthCitySpending' =>$monthlyCitySpendingpData,
            
            'genderData' => $genderData,
            'cityUserData' => $cityUsersData
        ];
    }

    public function getCityUsers($ageGroup){
        try{
            $query ="
           SELECT *
                FROM (
                    SELECT *,
                        CASE 
                            WHEN TIMESTAMPDIFF(YEAR, bDay, CURDATE()) BETWEEN 0 AND 12 THEN 'Child (0-12)'
                            WHEN TIMESTAMPDIFF(YEAR, bDay, CURDATE()) BETWEEN 13 AND 19 THEN 'Teenager (13-19)'
                            WHEN TIMESTAMPDIFF(YEAR, bDay, CURDATE()) BETWEEN 20 AND 35 THEN 'Young Adult (20-35)'
                            WHEN TIMESTAMPDIFF(YEAR, bDay, CURDATE()) BETWEEN 36 AND 55 THEN 'Adult (36-55)'
                            ELSE 'Others' 
                        END AS ageGroup
                    FROM customer
                ) AS c
                WHERE ageGroup = :ageGroup;
            ";

            $cityUsers = $this->conn->prepare($query);
            $cityUsers->execute([
                ':ageGroup' => $ageGroup
            ]);

            return $cityUsers->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            error_log("Error fetching city users!".$e->getMessage());
            return[];
        }
    }

 

    public function getMonthlySpendingByAgeGroup($ageGroup){
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
                AND (
                    CASE 
                        WHEN TIMESTAMPDIFF(YEAR, c.bDay, CURDATE()) BETWEEN 0 AND 12 THEN 'Child (0-12)'
                        WHEN TIMESTAMPDIFF(YEAR, c.bDay, CURDATE()) BETWEEN 13 AND 19 THEN 'Teenager (13-19)'
                        WHEN TIMESTAMPDIFF(YEAR, c.bDay, CURDATE()) BETWEEN 20 AND 35 THEN 'Young Adult (20-35)'
                        WHEN TIMESTAMPDIFF(YEAR, c.bDay, CURDATE()) BETWEEN 36 AND 55 THEN 'Adult (36-55)'
                        ELSE 'Others' 
                    END
                ) = :ageGroup
            GROUP BY 
                MONTH(p.created_at)
            ORDER BY 
                MONTH(p.created_at);

        ";
    
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':currentYear' => date('Y'),
            ':ageGroup' => $ageGroup
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
    

    public function getCityDataGender($ageGroup){
        try{
            $query = "
            SELECT 
                CASE 
                    WHEN sex = 'Male' THEN 'Male'
                    WHEN sex = 'Female' THEN 'Female'
                    ELSE 'Others'
                END AS gender, 
                COUNT(*) AS genderCount,
                ROUND(
                    (COUNT(*) / 
                        (SELECT COUNT(*) 
                        FROM customer 
                        WHERE 
                            CASE 
                                WHEN TIMESTAMPDIFF(YEAR, bDay, CURDATE()) BETWEEN 0 AND 12 THEN 'Child (0-12)'
                                WHEN TIMESTAMPDIFF(YEAR, bDay, CURDATE()) BETWEEN 13 AND 19 THEN 'Teenager (13-19)'
                                WHEN TIMESTAMPDIFF(YEAR, bDay, CURDATE()) BETWEEN 20 AND 35 THEN 'Young Adult (20-35)'
                                WHEN TIMESTAMPDIFF(YEAR, bDay, CURDATE()) BETWEEN 36 AND 55 THEN 'Adult (36-55)'
                                ELSE 'Others'
                            END = :ageGroup
                        )
                    ) * 100, 2
                ) AS percentage
            FROM 
                customer
            WHERE 
                CASE 
                    WHEN TIMESTAMPDIFF(YEAR, bDay, CURDATE()) BETWEEN 0 AND 12 THEN 'Child (0-12)'
                    WHEN TIMESTAMPDIFF(YEAR, bDay, CURDATE()) BETWEEN 13 AND 19 THEN 'Teenager (13-19)'
                    WHEN TIMESTAMPDIFF(YEAR, bDay, CURDATE()) BETWEEN 20 AND 35 THEN 'Young Adult (20-35)'
                    WHEN TIMESTAMPDIFF(YEAR, bDay, CURDATE()) BETWEEN 36 AND 55 THEN 'Adult (36-55)'
                    ELSE 'Others'
                END = :ageGroup
            GROUP BY 
                gender;

            ";
            $genderPercent = $this->conn->prepare($query);
            $genderPercent->execute([':ageGroup'=> $ageGroup]);

            return $genderPercent->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            error_log("Error fetching gender percentage!".$e->getMessage());
            return[];
        }
    }
}
?>