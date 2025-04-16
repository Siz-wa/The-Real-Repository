<?php
require_once "Controller.php";

class RegisterController extends Controller{

    private $addCustomerModel;
    public function __construct(){
        global $db;
        $this->addCustomerModel = new AddCustomerModel($db);
    }
    public function Register(){
      if (isset($_SESSION['user_id'])) {
        header("Location: ../views/dashboard/MainDash.php");
        exit();
      } 

      $this->loadView('register');
    }

    public function addCustomer($fname, $lname, $email, $password, $confirmPassword, $sex){
        
            $errors = $this->addCustomerModel->handleFormSubmission($fname, $lname, $email, $password, $confirmPassword, $sex);
       
            if(is_array($errors)){
                foreach ($errors as $errorMessage) {
                echo '<script>
                  document.addEventListener("DOMContentLoaded", function() {
                  const wrapper = document.querySelector(".wrapper.p-4.rounded.shadow.bg-white[style=\'width: 500px; overflow-y: auto;\']");
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
        } else{
            $this->loadView('home');
        }
        
        
         


        
        


    }
}
?>