<?php
require_once "../config/Database.php";

class AddCustomerModel
{

  private $conn;
 
  private $error = [];

  public function __construct($db) {
    $db = new Database();
    $this->conn = $db ->connect();
  }

  public function handleFormSubmission($fname,$lname,$email,$password,$confirmPassword,$sex){
    
      //  Ito din gagalawin ko im gonna think about it
      // Validate form data
      if ($this->validate($fname,$lname,$email,$password,$confirmPassword,$sex)) {

        // If validation passes, register the user
        $this->registerUser($fname,$lname,$email,$password, $sex);
        return true;
      }else {

        // passes the array of errors to the controller of register page
        return $this->error; 
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

    // Check if the email is already taken
    $query = $this->conn->prepare("SELECT COUNT(*) FROM `customer` WHERE `email` = :email");
    $query->bindParam(':email', $email);
    $query->execute();
    $emailCount = $query->fetchColumn();

    if ($emailCount > 0) {
      $this->error[] = "Email is already taken.";
      $isValid = false;
    }

    return $isValid;
  }

  private function registerUser($firstName, $lastName, $email, $password, $sex)
  {
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

  


    // Save user data to the database
    $addCustomer = $this->conn->prepare("INSERT INTO `customer`(`fname`, `lname`, `password`, `email`, `sex`, `pfPicture`) VALUES (:fname, :lname, :password, :email, :sex, :pfPicture)");
    $addCustomer->bindParam(':fname', $firstName);
    $addCustomer->bindParam(':lname', $lastName);
    $addCustomer->bindParam(':password', $hashedPassword);
    $addCustomer->bindParam(':email', $email);
    $addCustomer->bindParam(':sex', $sex);
   
    $image = file_get_contents('../public/assets/img/gallery/Neon.png');
    $addCustomer->bindParam(':pfPicture', $image);
    $addCustomer->execute();
  }
}
?>

