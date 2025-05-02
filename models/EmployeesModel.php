<?php
class EmployeesModel {
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

    public function addEmployee($data,$token) {
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


            $query = "INSERT INTO employee (userID, jobTitle) VALUES(:id, :jobTitle)";
            $stmt2 = $this->conn->prepare($query);
            $stmt2 -> execute([
                ':id' =>  $lastInsertId,
                ':jobTitle' => $data['role'] 
            ]);

            return true;
    
            
        } catch (PDOException $e) {
            error_log('Insert Error: ' . $e->getMessage());
           echo error_log('BIG ASS ERROR:'. $e->getMessage());
            return false;
        }
    }

    public function updateEmployee($data) {
        try {
            $this->conn->beginTransaction(); // Start transaction
    
            // Split full name
            $fullName = explode(' ', $data['name'], 3);
            $fname = $fullName[0];
            $lname = isset($fullName[1]) ? $fullName[1] : '';
    
            // Split location
            [$city, $province] = array_map('trim', explode(',', $data['location'] . ','));
    
            // Update customer table
            $sqlCustomer = "UPDATE customer 
                            SET fname = :fname, lname = :lname, email = :email, 
                                phoneNo = :phone, city = :city, province = :province 
                            WHERE customerID = :id";
            $stmtCustomer = $this->conn->prepare($sqlCustomer);
            $stmtCustomer->execute([
                ':fname' => $fname,
                ':lname' => $lname,
                ':email' => $data['email'],
                ':phone' => $data['phone'],
                ':city' => $city,
                ':province' => $province,
                ':id' => $data['id']
            ]);
    
            // Update employees table (jobTitle)
            $sqlEmployee = "UPDATE employee
                            SET jobTitle = :jobTitle 
                            WHERE userID = :id";
            $stmtEmployee = $this->conn->prepare($sqlEmployee);
            $stmtEmployee->execute([
                ':jobTitle' => $data['role'],
                ':id' => $data['id']
            ]);
            
            $this->conn->commit(); // Commit both updates
            return true;
    
        } catch (PDOException $e) {
            $this->conn->rollBack(); // Roll back on failure
            error_log('Update Error: ' . $e->getMessage());
            echo json_encode(['message' => 'DB error: ' . $e->getMessage()]); // For debugging
            return false;
        }
    }
    
    public function deleteEmployee($customerID) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM employee WHERE userID = :id");
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
                SELECT c.customerID, c.fname, c.lname, c.pfPicture, c.email, c.city, c.province, c.phoneNo,
                e.jobTitle
                FROM employee e
                JOIN customer c ON c.customerID = e.userID
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