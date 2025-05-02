<?php
class AdministratorModel {
    private $conn;
    public function __construct(){
        $this->conn = Database::getInstance()->getConnection();
    }

    public function EmployeesHandler(){
        $adminInfo = $this->getEmployees();
        return[
            'adminInfo' => $adminInfo
        ];
    }

    public function addAdmin($data,$token) {
        try {
            $fullName = explode(' ', $data['name'], 2);
            $fname = $fullName[0];
            $lname = isset($fullName[1]) ? $fullName[1] : '';
    
            [$city, $province] = array_map('trim', explode(',', $data['location'] . ','));
    
            // Hash the password before storing
            $hashedPassword = password_hash($token, PASSWORD_DEFAULT);
            $image = file_get_contents('../public/assetsD/images/user-profile.jpeg');
    
            $sql = "INSERT INTO customer (fname, lname, email, phoneNo, city, province, pfPicture, password)
                    VALUES (:fname, :lname, :email, :phone, :city, :province, :pfPicture, :password)";
            $stmt = $this->conn->prepare($sql);
             $result =$stmt->execute([
                ':fname' => $fname,
                ':lname' => $lname,
                ':email' => $data['email'],
                ':phone' => $data['phone'],
                ':city' => $city,
                ':province' => $province,
                ':pfPicture' => $image, // default profile picture
                ':password' => $hashedPassword
            ]);

            $lastInsertId = $this->conn->lastInsertId();


            $query = "INSERT INTO administrator (userID) VALUES(:id)";
            $stmt2 = $this->conn->prepare($query);
            $stmt2 -> execute([
                ':id' =>  $lastInsertId 
            ]);

            return true;
    
            
        } catch (PDOException $e) {
            error_log('Insert Error: ' . $e->getMessage());
           
            return false;
        }
    }

    public function updateEmployee($data){
        try {
            // Optional: Split name into fname and lname
            $fullName = explode(' ', $data['name'], 2);
            $fname = $fullName[0];
            $lname = isset($fullName[1]) ? $fullName[1] : '';

            // Split location
            [$city, $province] = array_map('trim', explode(',', $data['location'] . ','));

            $sql = "UPDATE customer SET fname = :fname, lname = :lname, email = :email, phoneNo = :phone, city = :city, province = :province WHERE customerID = :id";
            $stmt = $this->conn->prepare($sql);
            
            $query = "INSERT";
            
            return $stmt->execute([
                ':fname' => $fname,
                ':lname' => $lname,
                ':email' => $data['email'],
                ':phone' => $data['phone'],
             
                ':city' => $city,
                ':province' => $province,
                ':id' => $data['id']
            ]);
        } catch (PDOException $e) {
            error_log('Update Error: ' . $e->getMessage());
            return false;
        }
    }
    
    public function deleteEmployee($customerID) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM administrator WHERE userID = :id");
            $stmt->bindParam(':id', $customerID);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Delete failed: " . $e->getMessage());
            return false;
        }
    }

    public function getEmployees(){
        try {
            $query = "
                SELECT c.customerID, c.fname, c.lname, c.pfPicture, c.email, c.city, c.province, c.phoneNo
                FROM administrator a
                JOIN customer c ON c.customerID = a.userID
            ";
    
            $getemployees = $this->conn->prepare($query);
            $getemployees->execute();
    
            // Fetch all employees and convert pfPicture to base64 string
            $employees = $getemployees->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($employees as &$employee) {
                // If pfPicture exists, convert it to a base64 string
                if ($employee['pfPicture']) {
                    $employee['pfPicture'] = base64_encode($employee['pfPicture']);
                }
            }
    
            return $employees;
    
        } catch (PDOException $e) {
            error_log("Failed fetching employees: " . $e->getMessage());
            return [];
        }
    }
}
?>