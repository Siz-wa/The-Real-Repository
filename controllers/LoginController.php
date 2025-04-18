<?php
require_once "Controller.php";

class LoginController extends Controller{


    private $authenticateUserModel;
    private $email;
    private $password;
    

    public function __construct(){
        $this->authenticateUserModel = new AuthenticationModel();
    }
    public function Login(){

        if(isset($_POST['submit'])){


            if(isset($_POST['email']) && isset($_POST['password'])){
              $email = $_POST['email'];
              $password = $_POST['password'];
              
              
              if($_SERVER['REQUEST_METHOD']==='POST'){ 
                $this->loginUser( $email, $password);
                return;
              }
              }
          
          
        }

        if (isset($_SESSION['user_id'])) {
            header("Location: ../views/dashboard/MainDash.php");
            exit();
        }
    
        $this->loadView('login'); // load the login view
    
        
    }

    public function loginUser($email, $password){
        $this->email = $email ?? null;
        $this->password = $password ?? null;
        
        $result = $this->authenticateUserModel->authenticateUser($this->email, $this->password);

        if($result['success']){
            $user = $result['user'];
            $_SESSION['user'] = [
                'user_id' => $user['customerID'],
                'fname' => $user['fname'],
                'lname' => $user['lname'],
                'sex' => $user['sex'],
                'phoneNo' => $user['phoneNo'],
                'address' => $user['address'],
                'province' => $user['province'],
                'pfPicture' => "data:image/jpeg;base64," . base64_encode($user['pfPicture']),
                'salesrepEmployeeNum' => $user['salesrepEmployeeNum'],
                'email' => $user['email']
            ];

            header("Location: ../views/dashboard/MainDash.php");
            exit();
        }else{
            $errors = $result['errors'];
            $this->loadView('login', [
                'title' => 'Login',
                'errors' => $errors,
                ]);
        }
    }
}
?>