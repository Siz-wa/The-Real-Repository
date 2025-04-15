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
            header("Location: ../views/dashboard/MainDash.php");
            exit();
           
        }else{
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                const wrapper = document.querySelector(".wrapper.p-4.rounded.shadow.bg-white[style=\'width: 400px;\']");
                if (wrapper) {
                    const heading = wrapper.querySelector("h1.text-center.mb-4");
                    if (heading) {
                    const alertDiv = document.createElement("div");
                    alertDiv.className = "alert alert-danger";
                    alertDiv.role = "alert";
                    alertDiv.textContent = "You are not logged in!";
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
}
?>