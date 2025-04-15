<?php

class AuthenticationModel {
    private $conn;

  
    public function __construct($db) {
        $db = new Database();
        $this->conn = $db ->connect();
      }


      public function authenticateUser($email, $password) {
       
        $query = "SELECT * FROM customer WHERE email = :email";
        $login = $this->conn->prepare($query);
        $login->bindParam(':email', $email);
        $login->execute();

        if ($login->rowCount() > 0) {
            $user = $login->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['customerID'];
                $_SESSION['fname'] = $user['fname'];
                $_SESSION['lname'] = $user['lname'];
                $_SESSION['sex'] = $user['sex'];
                $_SESSION['phoneNo'] = $user['phoneNo'];
                $_SESSION['address'] = $user['address'];
                $_SESSION['province'] = $user['province'];
                $_SESSION['pfPicture'] = "data:image/jpeg;base64," . base64_encode($user['pfPicture']);
                $_SESSION['salesrepEmployeeNum'] = $user['salesrepEmployeeNum'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['password'] = $user['password'];
                
                
                
                header("Location: ../views/dashboard/MainDash.php");
                exit();
            }
        }else {
            return false; // Authentication failed
        }
  
    
  }

}


?>