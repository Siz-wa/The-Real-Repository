<?php
require_once "Controller.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

class ForgotPwController extends Controller{

    private $errors = [];
    private $messages =[];
    private $host = 'smtp.gmail.com';
    private $smtpAuth = true;
    private $username ='gordora.joey25@gmail.com';
    private $appPassword = 'cfcg ogco dyix hvmf'; 
    private $port = 587;

    private $forgotPwModel;
   
    public function __construct(){
        $this->forgotPwModel = new ForgotPwModel();
    }    
    public function ForgotPw(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
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
                            background-color: #ff6f61;
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
                        .reset-button {
                            display: inline-block;
                            margin: 20px 0;
                            padding: 10px 20px;
                            background-color: #ff6f61;
                            color: #ffffff;
                            text-decoration: none;
                            font-size: 16px;
                            font-weight: bold;
                            border-radius: 5px;
                        }
                        .reset-button:hover {
                            background-color: #e65a50;
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
                            Password Reset Request
                        </div>
                        <div class='email-body'>
                            <p>Hi,</p>
                            <p>We received a request to reset your password. Click the button below to reset your password:</p>
                            <p style='text-align: center;'>
                                <a href='$resetLink' class='reset-button'>Reset Password</a>
                            </p>
                            <p>If you did not request a password reset, please ignore this email or contact support if you have concerns.</p>
                            <p>Thank you,<br>Two Hearts Confections Team</p>
                        </div>
                        <div class='email-footer'>
                            &copy; " . date('Y') . " Two Hearts Confections. All rights reserved.
                        </div>
                    </div>
                </body>
            </html>";
    
            $this->forgotPwRequest($email, $mailbody, $subject, $token, $expirydate);
            return;
        }
    

        if(isset($_SESSION['user_id'])){
            header('Location: ../views/dashboard/MainDash.php');
            exit;

        }
        $this->loadView('forgotpw', [
            'title' => 'Forgot Password',
            'errors' => $this->errors,
            'messages' => $this->messages,
        ]);

    }

    public function forgotPwRequest($email,$mailbody,$subject,$token,$expirydate){

        $errors = $this->forgotPwModel->forgotPwHandler($email,$token,$expirydate);

        if($errors){
            $this->errors = $errors;
            $this->loadView('forgotpw', [
                'title' => 'Forgot Password',
                'errors' => $this->errors,
                'messages' => $this->messages,
            ]);
            

        }else{
            $this->sendEmail($email,$mailbody,$subject,$token);
            $this->messages[] = "A password reset link has been sent to your email address.";
            $this->loadView('forgotpw', [
                'title' => 'Forgot Password',
                'errors' => $this->errors,
                'messages' => $this->messages,
            ]);
        }
        
    }


     
   
    public function sendEmail($email,$mailbody,$subject,$token){
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();                                            
            $mail->Host       = $this->host;                     
            $mail->SMTPAuth   = $this->smtpAuth;                                  
            $mail->Username   = $this->username;                   
            $mail->Password   = $this->appPassword;                              
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
            $mail->Port       = $this->port;                                    

            //Recipients
            $mail->setFrom($this->username, 'Two Hearts Confections');
            $mail->addAddress($email);     

            // Content
            $mail->isHTML(true);                                  
            $mail->Subject = $subject;
            $mail->Body = $mailbody;
            
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>