<?php
require_once "Controller.php";

class RegisterController extends Controller{

    private $addCustomerModel;
    private $fname;
    private $lname;
    private $email;
    private $password;
    private $confirmPassword;
    private $sex;
    public function __construct(){
        global $db;
        $this->addCustomerModel = new AddCustomerModel($db);
    }
    public function Register(){
        $this->loadView('register');
    }

    public function addCustomer($fname, $lname, $email, $password, $confirmPassword, $sex){
        $this->fname = $fname ?? null;
        $this->lname = $lname ?? null;
        $this->email = $email ?? null;
        $this->password = $password ?? null;
        $this->confirmPassword = $confirmPassword ?? null;
        $this->sex = $sex ?? null;

        $this->addCustomerModel->handleFormSubmission($this->fname, $this->lname, $this->email, $this->password, $this->confirmPassword, $this->sex);  
        header('Location: ../views/test.html');
        exit;
        
        
         


        
        


    }
}
?>