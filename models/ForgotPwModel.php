<?php

class ForgotPwModel extends TokenGeneratorModel{

  
    private $error = [];
    public function __construct(){
        parent::__construct();
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
}
?>
