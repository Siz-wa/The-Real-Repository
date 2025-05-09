<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

abstract class Controller {
    private $host = 'smtp.gmail.com';
    private $smtpAuth = true;
    private $username ='gordora.joey25@gmail.com';
    private $appPassword = 'cfcg ogco dyix hvmf'; 
    private $port = 587;

    public function loadmodel($model){
        require_once "../models/{$model}.php";
        return new $model;
    }

    public function loadView($view, $data = []) {
      
        extract($data);
        include "../views/layouts/generals/generalLayout.php";
    }

    public function loadUserDashboard($view, $data = []) {
        extract($data);
        include "../views/layouts/users/dashboardLayout.php";  

    }
    
    // this is for admin
    public function loadAdmin($view, $data = []) {
        extract($data);
        include "../views/layouts/admin/dashboardLayout.php";  

    }

    // Reusable function to send emails from users
    public function sendEmail($email,$mailbody,$subject){
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
            $mail->setFrom('twoheartsconfection@thc.com', 'Two Hearts Confections');
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