<?php

class CategoryModel{
    protected $conn;

    public function __construct(){
        $this->conn = Database::getInstance()->getConnection(); // singleton call
    }

    public function categoryHandler(){
        $categoryData = $this->getCategory();

        return [
            'categoryData' => $categoryData
        ];
    }

    public function getCategory(){
        try {

            $query ="SELECT * FROM category";
            $getCat = $this->conn ->prepare($query);
            $getCat->execute();

            return $getCat->fetchAll(PDO::FETCH_ASSOC);
           
        } catch (PDOException $e) {
            error_log("Failed fetching cat details".$e->getMessage());
            return[];
        }
    }

    public function addCat($data) {
        try {
           
    
            $sql = "INSERT INTO category (`name`) VALUES (:catname)";
            $stmt = $this->conn->prepare($sql);
            $result =$stmt->execute([
                ':catname' => $data['name']
            ]);

            return true;
    
            
        } catch (PDOException $e) {
            error_log('Insert Error: ' . $e->getMessage());
           
            return false;
        }
    }

    public function updateCat($data){
        try {
         
            $sql = "UPDATE category SET `name` = :catname WHERE categoryID = :id";
            $stmt = $this->conn->prepare($sql);
            
            return $stmt->execute([
                ':catname' => $data['name'],
                ':id' => $data['id']
            ]);
        } catch (PDOException $e) {
            error_log('Update Error: ' . $e->getMessage());
            echo json_encode('message:'. $e->getMessage());
            return false;
        }
    }
    
    public function deleteCat($data) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM category WHERE categoryID = :id");
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