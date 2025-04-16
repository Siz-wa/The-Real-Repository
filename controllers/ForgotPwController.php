<?php
require_once "Controller.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

class ForgotPwController extends Controller{

    private $token;
    private $expirydate;
    private $host = 'smtp.gmail.com';
    private $smtpAuth = true;
    private $username ='gordora.joey25@gmail.com';
    private $appPassword = 'cfcg ogco dyix hvmf'; 
    private $port = 587;

    private $forgotPwModel;
   
    public function __construct(){
        global $db;
        $this->forgotPwModel = new forgotPwModel($db);
    }    
    public function ForgotPw(){

        if(isset($_SESSION['user_id'])){
            header('Location: ../views/dashboard/MainDash.php');
            exit;

        }
        $this->loadView('forgotpw');
    }

    public function forgotPwRequest($email,$mailbody,$subject,$token,$expirydate){

        $errors = $this->forgotPwModel->forgotPwHandler($email,$token,$expirydate);

        if($errors){
            foreach ($errors as $errorMessage) {
                echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                    const wrapper = document.querySelector(".wrapper.p-4.rounded.shadow.bg-white[style=\'width: 500px;\']");
                    if (wrapper) {
                        const heading = wrapper.querySelector("h1.text-center.mb-2");
                        if (heading) {
                            const alertDiv = document.createElement("div");
                            alertDiv.className = "alert alert-danger";
                            alertDiv.role = "alert";
                            alertDiv.textContent = "' . $errorMessage . '";
                            heading.insertAdjacentElement("afterend", alertDiv);
                            
                            // Set a timeout to fade out the alert after 5 seconds
                            setTimeout(function() {
                                let opacity = 1;
                                const fadeInterval = setInterval(function() {
                                    if (opacity <= 0) {
                                        clearInterval(fadeInterval);
                                        alertDiv.remove();
                                    } else {
                                        opacity -= 0.1;
                                        alertDiv.style.opacity = opacity;
                                    }
                                }, 50); // Adjust the interval for smoother fading
                            }, 5000);
                        }
                    }
                    });
                    </script>';
            } 

        }else{
            $this->sendEmail($email,$mailbody,$subject,$token);
            echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                    const wrapper = document.querySelector(".wrapper.p-4.rounded.shadow.bg-white[style=\'width: 500px;\']");
                    if (wrapper) {
                        const heading = wrapper.querySelector("h1.text-center.mb-2");
                        if (heading) {
                            const alertDiv = document.createElement("div");
                            alertDiv.className = "alert alert-success";
                            alertDiv.role = "success";
                            alertDiv.textContent = "A password reset link has been sent to your email address. Please check your inbox.";
                            heading.insertAdjacentElement("afterend", alertDiv);
                            
                            // Set a timeout to fade out the alert after 5 seconds
                            setTimeout(function() {
                                let opacity = 1;
                                const fadeInterval = setInterval(function() {
                                    if (opacity <= 0) {
                                        clearInterval(fadeInterval);
                                        alertDiv.remove();
                                    } else {
                                        opacity -= 0.1;
                                        alertDiv.style.opacity = opacity;
                                    }
                                }, 50); // Adjust the interval for smoother fading
                            }, 5000);
                        }
                    }
                    });
                    </script>';
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