<?php
require_once "Controller.php";

class RegisterController extends Controller{

    private $addCustomerModel;
    private $errors= [];
    private $messages = [];
    public function __construct(){
        $this->addCustomerModel = new AddCustomerModel();
    }
    public function Register(){

      if(isset($_POST['submit'])){

        if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm-password'])&& isset($_POST['sex'])){
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $confirm_password = $_POST['confirm-password'];
          $sex = $_POST['sex'];
      
      
      
          if($_SERVER['REQUEST_METHOD']==='POST'){
            
        
            $this->addCustomer($fname, $lname, $email, $password, $confirm_password, $sex);
            return;
          }
          }
       }

      if (isset($_SESSION['user_id'])) {
        header("Location: ../views/dashboard/MainDash.php");
        exit();
      } 

      $this->loadView('register');
    }

    public function addCustomer($fname, $lname, $email, $password, $confirmPassword, $sex){
        
            $errors = $this->addCustomerModel->handleFormSubmission($fname, $lname, $email, $password, $confirmPassword, $sex);
       
            if(is_array($errors)){
                $this->errors = $errors;
                $this->loadView('register', [
                    'title' => 'Register',
                    'errors' => $this->errors,
                    'messages' => $this->messages,
                ]);
        } else{
              $this->loadView('home');
        }
        
        
         


        
        


    }
}
?>