<?php
class ChangePwModel{

    private $conn;
    private $error = [];

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection(); // singleton call
    }


    public function forgotPwHandler($token,$newPassword, $confirmedPassword){
       
        if($this->tokenValidator($token)){
            if($this->validatePassword(null,$newPassword,$confirmedPassword)){

                $this->changePassword($token,$newPassword);
                
                
            }else {
                return $this->error;
            }
        }else{
            return $this->error;
            
        }

    }

    

    public function validatePassword($currentPassword, $newPassword, $confirmedPassword){
        $isValid = true;



        if($currentPassword == null){
           
            // THIS BLOCK IS FOR FORGOT PASSWORD
            if (empty($newPassword) || empty($confirmedPassword)) {
                $this->error[] = "New password and confirmed password are required.";
                $isValid = false;
            } 
            if($newPassword !== $confirmedPassword) {
                $this->error[] = "New password and confirmed password do not match.";
                $isValid = false;
            } 
            if (strlen($newPassword) < 8) {
                $this->error[] = "New password must be at least 8 characters long.";
                $isValid = false;
            } 
            if (!preg_match('/[A-Z]/', $newPassword)) {
                $this->error[] = "New password must contain at least one uppercase letter.";
                $isValid = false;
            } 
            if (!preg_match('/[a-z]/', $newPassword)) {
                $this->error[] = "New password must contain at least one lowercase letter.";
                $isValid = false;
            } 
            if (!preg_match('/[0-9]/', $newPassword)) {
                $this->error[] = "New password must contain at least one number.";
                $isValid = false;
            } 
            if (!preg_match('/[\W_]/', $newPassword)) {
                $this->error[] = "New password must contain at least one special character.";
                $isValid = false;
            } 
            
            return $isValid;

        } elseif (isset($currentPassword) && isset($newPassword) && isset($confirmedPassword)) {
            
            // THIS BLOCK IS FOR CHANGE PASSWORD

            $isValid = true;
            
            if (empty($currentPassword) || empty($newPassword) || empty($confirmedPassword)) {
                $this->error[] = "All fields are required.";
                $isValid = false;
            }
            
            if ($newPassword !== $confirmedPassword) {
                $this->error[] = "New password and confirmed password do not match.";
                $isValid = false;
            } 
            
            if (strlen($newPassword) < 8) {
                $this->error[] = "New password must be at least 8 characters long.";
                $isValid = false;
            } 
            
            if (!preg_match('/[A-Z]/', $newPassword)) {
                $this->error[] = "New password must contain at least one uppercase letter.";
                $isValid = false;
            } 
            
            if (!preg_match('/[a-z]/', $newPassword)) {
                $this->error[] = "New password must contain at least one lowercase letter.";
                $isValid = false;
            } 
            
            if (!preg_match('/[0-9]/', $newPassword)) {
                $this->error[] = "New password must contain at least one number.";
                $isValid = false;
            } 
            
            if (!preg_match('/[\W_]/', $newPassword)) {
                $this->error[] = "New password must contain at least one special character.";
                $isValid = false;
            } 
            
            if ($currentPassword === $newPassword) {
                $this->error[] = "New password cannot be the same as the current password.";
                $isValid = false;
            }
                return $isValid; // will continue the process
            
        }

    }

    public function tokenValidator($token){
        
        if (isset($token)) {
            try {
                $query = "SELECT resetToken, tokenExpiry FROM customer WHERE resetToken = :resetToken";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':resetToken', $token);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$result) {
                    $this->error[] = "Token is invalid.";
                    return false; // will throw an error
                } else {
                    if ($result['tokenExpiry'] < time()) {
                        $this->error[] = "Token has expired.";
                        return false; // will throw an error
                    }
                    return true; // will continue the process
                }
            } catch (PDOException $e) {
                $this->error[] = "Database error: " . $e->getMessage();
                return false; // will throw an error
            }
     } 
     
     else {
            $this->error[] = "Token is required.";
            return false; // will throw an error
        }

        

    }

    public function changePassword($token,$newPassword){
        
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            
            try {
                $query = "UPDATE customer SET password = :newPassword WHERE resetToken = :resetToken";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':newPassword', $hashedPassword);
                $stmt->bindParam(':resetToken', $token);
                $stmt->execute();
            } catch (PDOException $e) {
                $this->error[] = "Failed to update password: " . $e->getMessage();
                return false;
            }
            
            // Clear the token and expiry date after successful password change
            try {
                $clearQuery = "UPDATE customer SET resetToken = NULL, tokenExpiry = NULL WHERE resetToken = :resetToken";
                $clearStmt = $this->conn->prepare($clearQuery);
                $clearStmt->bindParam(':resetToken', $token);
                $clearStmt->execute();
            } catch (PDOException $e) {
                $this->error[] = "Failed to clear token and expiry: " . $e->getMessage();
                return false;
            }
    }
}

?>