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
            
           if($this->getRole($user['customerID'])){
                return[
                    'success' => true,
                    'user' => $user,
                    'admin' => true,
                    'errors' => null
                   ];

            }else{
                return[
                    'success' => true,
                    'user' => $user,
                    'admin' => false,
                    'errors' => null
                   ];
            }

        } else{
            return [
                'success' => false,
                'user' => null,
                'admin' => false,
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
        
        if(!$this->findUser($email,$password)){
            $this->errors[] = "Email or password is incorrect.";
            $isValid = false;
        }

        return $isValid;

    }

    public function findUser($email, $password){
            $query = "SELECT * FROM customer WHERE email = :email";
            $login = $this->conn->prepare($query);
            $login->bindParam(':email', $email);
            $login->execute();

            if($login->rowCount()>0){
                $isValid = true;

                $user = $login->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $user['password'])) {
                    return $user; 
                }else{
                    $isValid = false;
                }

                return $isValid; // Authentication failed
        }

    }

    public function getRole($userID){
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