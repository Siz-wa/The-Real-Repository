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

      // Validate form data
      if ($this->validate( $this->firstName, $this->lastName,  $this->email, $this->password, $this->confirmPassword, $this->sex)) {

        $this->registerUser( $this->firstName, $this->lastName,  $this->email, $this->password, $this->sex);
        header('Location: ../views/test.html');
        exit;
      
      } else {
        echo '<p style="color: red;">Validation failed. Please check your inputs.</p>';
      }
    
  }

  private function validate($firstName, $lastName, $email, $password, $confirmPassword, $sex)
  {
    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($confirmPassword) || empty($sex)) {
      return false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return false;
    }

    if ($password !== $confirmPassword) {
      return false;
    }

    return true;
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

// // Instantiate and handle the page
// $page = new RegisterPage();
// $page->handleFormSubmission();
// $page->render();
?>

