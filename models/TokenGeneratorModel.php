<?php

class TokenGeneratorModel{
    protected $conn;
    private $error = [];

    public function __construct(){
        $this->conn = Database::getInstance()->getConnection(); // singleton call
    }
    public function tokendatabase($email,$token,$expiryDate){
        try {
            $tokener = $this->conn->prepare("UPDATE customer SET resetToken = :resetToken, tokenExpiry = :tokenExpiry WHERE email = :email");
            $tokener->bindParam(':email', $email);
            $tokener->bindParam(':resetToken', $token);
            $tokener->bindParam(':tokenExpiry', $expiryDate);
    
            return $tokener->execute();
        } catch (PDOException $e) {
            $this->error[] = "Failed to update token: " . $e->getMessage();
            return false;
        }
    }
}
?>