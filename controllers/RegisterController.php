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

      if (isset($_SESSION['user']['user_id'])) {
        header("Location: ../public/index.php?action=dashboarduser");
        exit();
    }

      if(isset($_POST['submit'])){
        if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm-password'])&& isset($_POST['sex'])){
            $fname = htmlspecialchars(trim($_POST['fname']), ENT_QUOTES, 'UTF-8');
            $lname = htmlspecialchars(trim($_POST['lname']), ENT_QUOTES, 'UTF-8');
            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
            $password = htmlspecialchars(trim($_POST['password']), ENT_QUOTES, 'UTF-8');
            $confirm_password = htmlspecialchars(trim($_POST['confirm-password']), ENT_QUOTES, 'UTF-8');
            $sex = htmlspecialchars(trim($_POST['sex']), ENT_QUOTES, 'UTF-8');

            $token = bin2hex(random_bytes(32));
            $expirydate = date('Y-m-d H:i:s', strtotime('+1 hour'));
            $subject = 'Password Reset Request';
            $resetLink = "http://localhost/../public/index.php?action=changepw&token=" . urlencode($token);
            $mailbody = "
            <html>
              <head>
                <style>
                  body {
                    font-family: Arial, sans-serif;
                    background-color: #f9f9f9;
                    color: #333;
                    line-height: 1.6;
                    margin: 0;
                    padding: 0;
                  }
                  .email-container {
                    max-width: 600px;
                    margin: 20px auto;
                    background: #ffffff;
                    border: 1px solid #ddd;
                    border-radius: 8px;
                    overflow: hidden;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                  }
                  .email-header {
                    background-color: #0197e1;
                    color: #ffffff;
                    text-align: center;
                    padding: 20px;
                    font-size: 24px;
                    font-weight: bold;
                  }
                  .email-body {
                    padding: 20px;
                  }
                  .email-body p {
                    margin: 10px 0;
                  }
                  .verify-button {
                    display: inline-block;
                    margin: 20px 0;
                    padding: 10px 20px;
                    background-color: #0197e1;
                    color: #ffffff;
                    text-decoration: none;
                    font-size: 16px;
                    font-weight: bold;
                    border-radius: 5px;
                  }
                  .verify-button:hover {
                    background-color: #e58f3c;
                  }
                  .email-footer {
                    text-align: center;
                    padding: 10px;
                    font-size: 12px;
                    color: #777;
                    background-color: #f1f1f1;
                  }
                </style>
              </head>
              <body>
                <div class='email-container'>
                  <div class='email-header'>
                    Account Verification
                  </div>
                  <div class='email-body'>
                    <p>Hi,</p>
                    <p>Thank you for registering with us! Please verify your email address by clicking the button below:</p>
                    <p style='text-align: center;'>
                      <a href='$resetLink' class='verify-button'>Verify Account</a>
                    </p>
                    <p>If you did not create an account, please ignore this email or contact support if you have concerns.</p>
                    <p>Thank you,<br>Two Hearts Confections Team</p>
                  </div>
                  <div class='email-footer'>
                    &copy; " . date('Y') . " Two Hearts Confections. All rights reserved.
                  </div>
                </div>
              </body>
            </html>";
      
          if($_SERVER['REQUEST_METHOD']==='POST'){
            if($this->addCustomer($fname, $lname, $email, $password, $confirm_password, $sex, $token, $expirydate)){
              // Send the email
              $this->sendEmail($email,$mailbody,$subject);
              $this->messages[] = "Registration successful! Please check your email to verify your account.";
              $this->loadView('register', [
                'title' => 'Register',
                'errors' => $this->errors,
                'messages' => $this->messages,
            ]);
            }            
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

    public function addCustomer($fname, $lname, $email, $password, $confirmPassword, $sex, $token, $expirydate){
            $errors = $this->addCustomerModel->handleFormSubmission($fname, $lname, $email, $password, $confirmPassword, $sex, $token, $expirydate);
       
            if(is_array($errors) && isset($errors)){
                $this->errors = $errors;
                $this->loadView('register', [
                    'title' => 'Register',
                    'errors' => $this->errors,
                    'messages' => $this->messages,
                ]);   
            } else{
                  return true; // Registration successful
            }
    }
}
?>