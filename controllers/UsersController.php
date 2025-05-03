<?php
class UsersController extends Controller{
    private $usersModel;
    public function __construct(){
        $this->usersModel = new UsersModel();
    }

    public function Users(){
        if (isset($_SESSION['user']['user_id']) && $_SESSION['user']['admin'] === false ) {
            header("Location: ?action=dashboarduser");
            exit();
        }else if(!isset( $_SESSION['user']['admin'])) {
            header("Location: ?action=home");
        }

        $customerID = $_GET['userID'];

        $userData = $this->usersModel->UsersHandler($customerID);
        
        $userFname = [];
        $userLname = [];
        $userSex = [];
        $Bday = [];
        $phoneNo = [];
        $blk = [];
        $lot = [];
        $st = [];
        $city = [];
        $province = [];
        $zipCode = [];
        $pfPicture = [];
        $email = [];
        $isVerified = [];
        
        
        foreach($userData['userInfo'] as $data){
            $userFname = $data['fname'];
            $userLname = $data['lname'];
            $userSex = $data['sex'];
            $Bday = $data['Bday'];
            $phoneNo = $data['phoneNo'];
            $blk = $data['blk'];
            $lot  = $data['lot'];
            $st  = $data['street'];
            $city = $data['city'];
            $province  = $data['province'];
            $zipCode  = $data['ZipCode'];
            $pfPicture =  "data:image/jpeg;base64," . base64_encode($data['pfPicture']);
            $email = $data['email'];
            $isVerified = $data['isVerified'];
            
        }

        $this->loadAdmin('users',[
            'fname' => $userFname,
            'lname' => $userLname,
            'sex' =>$userSex,
            'Bday' =>$Bday,
            'phoneNo' =>$phoneNo,
            'blk' =>$blk,
            'lot'=>$lot,
            'st' =>$st,
            'city' =>$city,
            'province' =>$province,
            'zipcode' =>$zipCode,
            'pfPicture' =>$pfPicture,
            'email' =>$email,
            'isVerified' => $isVerified,
            'orderData' => $userData['orderData'],
            'subsData' => $userData['subsData'],
            'paymentData' => $userData['paymentData']
            
        ]);
    }
}
?>