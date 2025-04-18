<?php
require_once "Controller.php";

class ChangePwController extends Controller{

    private $changePwModel;
    private $errors;
    private $messages;

    

    public function __construct(){
      
      $this->changePwModel = new ChangePwModel();   
    }
    public function ChangePwd(){

      if(isset($_POST['submit'])){


        if(isset($_POST['password']) && isset($_POST['confirmPassword'])){
          $token = isset($_GET['token']) ? $_GET['token'] : null;
          
          
          if($_SERVER['REQUEST_METHOD']==='POST'){

            $this->forgotPassword( $token, $_POST['password'], $_POST['confirmPassword']);
            return;
          }
          }
    
       }

      $this->loadView('changepw', ['errors'=>$this->errors, 'messages'=>$this->messages]); // load the change password view
    }

    public function forgotPassword($token,$newPassword, $confirmedPassword){

      
        
      $errors = $this->changePwModel->forgotPwHandler($token,$newPassword, $confirmedPassword);
      if($errors){
       $this->errors = $errors;
       $this->loadView('changepw',
        ['errors'=>$this->errors,
        'messages'=>$this->messages]);

      }else {
        $this->messages[] = "Password changed successfully!";
        $this->loadView('changepw',
        ['errors'=>$this->errors,
        'messages'=>$this->messages]); 
      }     
}
}
?>