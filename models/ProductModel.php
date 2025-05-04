<?php
class ProductModel {
    private $conn;
    public function __construct(){
        $this->conn = Database::getInstance()->getConnection();
    }

    public function ProductHandler(){
        $productInfo = $this->getProduct();
        $cat = $this->getCat();
        return[
            'cats' => $cat,
            'productInfo' => $productInfo
        ];
    }

    public function getCat(){
        try {

            $query ="SELECT * FROM category";
            $getcat = $this->conn ->prepare($query);
            $getcat->execute();

            return $getcat->fetchAll(PDO::FETCH_ASSOC);
           
        } catch (PDOException $e) {
            error_log("Failed fetching payment details".$e->getMessage());
            return[];
        }
    }

    public function addProduct($data) {
        try {
            $query = "
                INSERT INTO product 
                (productName, description, image, categoryID)
                VALUES (:productName, :description, :image, :categoryID)
            ";
    
            $add = $this->conn->prepare($query);
            $add->execute([
                ':productName' => $data['name'],
                ':description' => $data['email'],
                ':image' => $data['image'], // already binary from file_get_contents
                ':categoryID' => $data['role'],
            ]);
    
            return true;
    
        } catch (PDOException $e) {
            error_log('Insert Error: ' . $e->getMessage());
            return false;
        }
    }
    
    

    public function updateProduct($data){
        try {

            $query = "
                UPDATE product SET 
                    productName = :productName,
                    description =:description,
                    image = :image,
                    categoryID = :categoryID
                WHERE 
                    productID = :id

            ";
            // Optional: Split name into fname and lname
            $add = $this->conn->prepare($query);
            $add->execute([
                ':productName' => $data['name'],
                ':description' => $data['email'],
                ':image' => $data['image'], // already binary from file_get_contents
                ':categoryID' => $data['categoryID'],
                ':id' => $data['id']
            ]);

            return true;

        } catch (PDOException $e) {
            error_log('Update Error: ' . $e->getMessage());
            return false;
        }
    }
    
    public function deleteProduct($customerID) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM Product WHERE productID = :id");
            $stmt->bindParam(':id', $customerID);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Delete failed: " . $e->getMessage());
            return false;
        }
    }

    public function getProduct(){
        try {
            $query = "
                SELECT 
                p.productName, p.image, p.description, p.productID,
                c.categoryID, c.name
                FROM product p
                JOIN category c ON c.categoryID = p.categoryID
            ";
    
            $getProduct = $this->conn->prepare($query);
            $getProduct->execute();
    
            // Fetch all employees and convert pfPicture to base64 string
            $products = $getProduct->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($products as &$product) {
                // If pfPicture exists, convert it to a base64 string
                if ($product['image']) {
                    $product['image'] = base64_encode($product['image']);
                }
            }
    
            return $products;
    
        } catch (PDOException $e) {
            error_log("Failed fetching products: " . $e->getMessage());
            return [];
        }
    }
}
?>