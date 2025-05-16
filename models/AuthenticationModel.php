<?php

class AuthenticationModel {
    private $conn;
    private $errors = [];
    
    
   

  
    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }


    public function authenticateUser($email, $password) {
       
        if($this->validate($email,$password)){
           $user = $this->findUser($email,$password);

           if(!$user || !is_array($user)){
                $this->errors[] = "Invalid email or password.";
                return [
                    'success' => false,
                    'user' => null,
                    'admin' => false,
                    'employee' => false,
                    'errors' => $this->errors
                ];

           }else
           {
            if($this->getAdmin($user['customerID'])){
                return[
                    'success' => true,
                    'user' => $user,
                    'admin' => true,
                    'employee' => false,
                    'errors' => null
                   ];

            }else if($this->getEmployee($user['customerID'])){
                 return[
                    'success' => true,
                    'user' => $user,
                    'employee' => true,
                    'admin' => false,
                    'errors' => null
                   ];

            }
            else{
                return[
                    'success' => true,
                    'user' => $user,
                    'admin' => false,
                    'employee' => false,
                    'errors' => null
                   ];
            }   

           }
            
           

        } else{
            return [
                'success' => false,
                'user' => null,
                'admin' => false,
                'employee' => false,
                'errors' => $this->errors
            ];
        }
    }

    public function validate($email,$password){
        $isValid = true; // Initialize as valid
        if(empty($email) || empty($password)) {

            $this->errors[] = "Email and password are required.";
            $isValid = false;
        } 
        
      

        return $isValid;

    }

   public function findUser($email, $password){
    $query = "SELECT * FROM customer WHERE email = :email";
    $login = $this->conn->prepare($query);
    $login->bindParam(':email', $email);
    $login->execute();

    if($login->rowCount() > 0){
        $user = $login->fetch(PDO::FETCH_ASSOC);

       

        if (isset($user['password']) && password_verify($password, $user['password'])) {
            return $user; 
        } else {
            return false; // Password mismatch
        }
    }

    

    return false; // No user found
}

    public function getEmployee($userID){
        try {
            $query = "SELECT * FROM employee WHERE userID = :customerID";
            $getRole = $this->conn->prepare($query);
            $getRole->bindParam(':customerID', $userID);
            $getRole->execute();
            if ($getRole->rowCount() > 0) {
            return true;
            }
        } catch (PDOException $e) {
            $this->errors[] = "Error fetching role: " . $e->getMessage();
            return false;
        }
    }

    
    public function getAdmin($userID){
        try {
            $query = "SELECT * FROM administrator WHERE userID = :customerID";
            $getRole = $this->conn->prepare($query);
            $getRole->bindParam(':customerID', $userID);
            $getRole->execute();
            if ($getRole->rowCount() > 0) {
            return true;
            }
        } catch (PDOException $e) {
            $this->errors[] = "Error fetching role: " . $e->getMessage();
            return false;
        }
    }



}


?>