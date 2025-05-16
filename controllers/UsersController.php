<?php
class UsersController extends Controller{
    private $usersModel;
    public function __construct(){
        $this->usersModel = new UsersModel();
    }

    public function Users(){
       

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

        foreach($userData['paymentData'] as $data){
            $data['Amount'] = number_format($data['Amount'], 2);
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