<?php
require_once "Controller.php";

class LoginController extends Controller{


    private $authenticateUserModel;
    private $email;
    private $password;
    

    public function __construct(){
        global $db;
        $this->authenticateUserModel = new AuthenticationModel($db);
    }
    public function Login(){
        $this->loadView('login');
    }

    public function loginUser($email, $password){
        $this->email = $email ?? null;
        $this->password = $password ?? null;
        
        if($this->authenticateUserModel->authenticateUser($this->email, $this->password)){
            // Redirect to home page or dashboard
           
        }else{
            // Redirect back to login page with error message
            
        }
    }
}
?>