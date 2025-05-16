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

        if (isset($_SESSION['user']['user_id'])) {
                header("Location: ?action=users&userID=".$_SESSION['user']['user_id']);
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
                'blk' => $user['blk'],
                'lot' => $user['lot'],
                'zipCode' => $user['ZipCode'],
                'province' => $user['province'],
                'city' => $user['city'],
                'pfPicture' => "data:image/jpeg;base64," . base64_encode($user['pfPicture']),
                'email' => $user['email'],
                'Bday' => $user['Bday'],
                'isVerified' => $user['isVerified'],
                'admin' => $result['admin'],
                'jobTitle' => $user['jobTitle'],
                'employeeID' => $user['employeeID'],
                'adminID' => $user['adminID'],
                'employee' => $result['employee'],
                'availability' => true,
            ];

            if($result['admin']){
                header("Location: ?action=admindashboard");
                exit();
            }else if($result['employee']){
                 header("Location: ?action=admindashboard");
                exit();
            }
            else{
                header("Location: ?action=users&userID=".$_SESSION['user']['user_id']);
                exit();
            }

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