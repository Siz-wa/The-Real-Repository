<?php
class AuthenticationModel {
    private $conn;

  
    public function __construct($db) {
        $db = new Database();
        $this->conn = $db ->connect();
      }


      public function authenticateUser($email, $password) {
       
        $query = "SELECT * FROM customer WHERE email = :email";
        $login = $this->conn->prepare($query);
        $login->bindParam(':email', $email);
        $login->execute();

        if ($login->rowCount() > 0) {
            $user = $login->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                const wrapper = document.querySelector(".wrapper.p-4.rounded.shadow.bg-white[style=\'width: 400px;\']");
                if (wrapper) {
                    const heading = wrapper.querySelector("h1.text-center.mb-4");
                    if (heading) {
                    const alertDiv = document.createElement("div");
                    alertDiv.className = "alert alert-success";
                    alertDiv.role = "alert";
                    alertDiv.textContent = "You have successfully logged in!";
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
            return true;
            }
        }else {
            return false; // Authentication failed
        }
  
    
  }

}


?>