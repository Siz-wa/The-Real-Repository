<?php
require_once "../config/Database.php";

class AddCustomerModel
{

  private $conn;
  private $firstName;
  private $lastName;
  private $email;
  private $password;
  private $confirmPassword;
  private $sex;
  private $error = [];

  public function __construct($db) {
    $db = new Database();
    $this->conn = $db ->connect();
  }

  public function handleFormSubmission($fname,$lname,$email,$password,$confirmPassword,$sex){
   
      $this->firstName = $fname ?? 'ERROR202';
      $this->lastName = $lname ?? 'ERROR202';
      $this->email = $email ?? 'ERROR202';
      $this->password = $password ?? 'ERROR202';
      $this->confirmPassword = $confirmPassword ?? 'ERROR202';
      $this->sex = $sex ?? 'ERROR202';
    
      //  Ito din gagalawin ko im gonna think about it
      // Validate form data
      if ($this->validate( $this->firstName, $this->lastName,  $this->email, $this->password, $this->confirmPassword, $this->sex)) {

        // If validation passes, register the user
        $this->registerUser( $this->firstName, $this->lastName,  $this->email, $this->password, $this->sex);
      
      }else {

        // Display error messages
        // after finding validation errors in validate()
        foreach ($this->error as $errorMessage) {
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
      }
    
  }



// This methods validate the user input
// It checks if the fields are empty, if the email is valid, if the passwords match, and if the password meets the criteria
  public function validate($firstName, $lastName, $email, $password, $confirmPassword, $sex)
  {

    $isValid = true;

    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($confirmPassword) || empty($sex)) {
      $this->error[] = "All fields are required.";
      $isValid = false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $this->error[] = "Invalid email format.";
      $isValid = false;
    }

    if ($password !== $confirmPassword) {
      $this->error[] = "Passwords do not match.";
      $isValid = false;
    }

    // Check for special characters in fields
    $pattern = '/[^a-zA-Z\s]/'; // Allow only letters and spaces
    if (preg_match($pattern, $firstName)) {
      $this->error[] = "First name contains invalid characters or numerals.";
      $isValid = false;
    }
    if (preg_match($pattern, $lastName)) {
      $this->error[] = "Last name contains invalid characters or numerals.";
      $isValid = false;
    }
    if (preg_match($pattern, $sex)) {
      $this->error[] = "Sex contains invalid characters.";
      $isValid = false;
    }

    // Validate password length and at least one number
    if (strlen($password) < 8) {
      $this->error[] = "Password must be at least 8 characters long.";
      $isValid = false;
    }
    if (!preg_match('/\d/', $password)) {
      $this->error[] = "Password must contain at least one number.";
      $isValid = false;
    }

    return $isValid;
  }

  private function registerUser($firstName, $lastName, $email, $password, $sex)
  {
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Save user data to the database (example code, replace with actual database logic)
    // $db = new Database();
    // $db->query("INSERT INTO users (first_name, last_name, email, password, sex) VALUES (?, ?, ?, ?, ?)", [$firstName, $lastName, $email, $hashedPassword, $sex]);

    $addCustomer = $this->conn->prepare("INSERT INTO `customer`(`fname`,`lname`,`password`,`email`,`sex`) VALUES (:fname,:lname,:password,:email,:sex)");
    $addCustomer->bindParam(':fname', $firstName);
    $addCustomer->bindParam(':lname', $lastName);
    $addCustomer->bindParam(':password', $hashedPassword);
    $addCustomer->bindParam(':email', $email);
    $addCustomer->bindParam(':sex', $sex);
    $addCustomer->execute();
  }
}
?>

