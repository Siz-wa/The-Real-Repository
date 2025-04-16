<?php

class ForgotPwModel {

    private $conn;
    private $error = [];
    
   


    public function __construct($db){
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function forgotPwHandler($email,$token,$expiryDate,){

        if($this->checkEmail($email)){
            $this->tokendatabase($email,$token,$expiryDate);

        }else{
            return $this->error;
        }
        
        
    }



    // This method checks if the email exists in the database
    public function checkEmail($email){


        try {
            $exist = $this->conn->prepare("SELECT * FROM customer WHERE email = :email");
            $exist->bindParam(':email', $email);
            $exist->execute();
            
            // Check if the email exists in the database
            // returns false which makes it invalid and no email will be sent
            if ($exist->rowCount() === 0) {
            $this->error[] = "Email does not correspond to any account.";
            return false;   
            }

            return true;

        } catch (PDOException $e) {
            $this->error[] = "Failed to check email in the database: " . $e->getMessage();
            return false;
        }
    }



    // This method generates a token and stores it in the database along with the expiry date
    public function tokendatabase($email,$token,$expiryDate){

       
        
        try {
            // Check if the email already has a token and expiry_date
            $check = $this->conn->prepare("SELECT resetToken, tokenExpiry FROM customer WHERE email = :email");
            $check->bindParam(':email', $email);
            $check->execute();

            if ($check->rowCount() > 0) {
            // If token and expiry_date exist, update them
            $tokener = $this->conn->prepare("UPDATE customer SET resetToken = :resetToken, tokenExpiry = :tokenExpiry WHERE email = :email");
            } else {
            // If token and expiry_date do not exist, insert them
            $tokener = $this->conn->prepare("INSERT INTO customer (email, resetToken, expiry_date) VALUES (:email, :resetToken, :expiry_date)");
            }

            $tokener->bindParam(':email', $email);
            $tokener->bindParam(':resetToken', $token);
            $tokener->bindParam(':tokenExpiry', $expiryDate);

            if ($tokener->execute()) {
            // Send email with the token link
            return true;
            } else {
            return false;
            }

        } catch (PDOException $e) {
            $this->error[] = "Failed to update or insert token in the database: " . $e->getMessage();
            return false;
        }
        
    }

    



}
?>
