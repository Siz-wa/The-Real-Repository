<?php
class AgeGroupsDataController extends Controller{
    private $ageGroupsDataModel;

    public function __construct(){
        $this->ageGroupsDataModel = new AgeGroupsDataModel();
    }

    public function AgeGroupsData(){
        if (isset($_SESSION['user']['user_id']) && $_SESSION['user']['admin'] === false ) {
            header("Location: ?action=dashboarduser");
            exit();
        }else if(!isset( $_SESSION['user']['admin'])) {
            header("Location: ?action=home");
        }

        
        $ageGroups = $_GET['ageGroup'];

        $AgeGroupsDataAnalytics = $this->ageGroupsDataModel->ageGroupHandler($ageGroups);

        // gender distribution in in cities
        $gender = [];
        $genderPercentage = [];

        foreach($AgeGroupsDataAnalytics['genderData'] as $data){
            $gender[] = $data['gender'];
            $genderPercentage[] = $data['percentage'];
        }
        // age distribution in cities

       

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
        $customerID = [];
        
        foreach($AgeGroupsDataAnalytics['cityUserData'] as $data){
            $userFname[] = $data['fname'];
            $userLname[] = $data['lname'];
            $userSex[] = $data['sex'];
            $Bday[] = $data['Bday'];
            $phoneNo[] = $data['phoneNo'];
            $blk[] = $data['blk'];
            $lot[] = $data['lot'];
            $st[] = $data['street'];
            $city[] = $data['city'];
            $province[] = $data['province'];
            $zipCode[] = $data['ZipCode'];
            $pfPicture[] =  "data:image/jpeg;base64," . base64_encode($data['pfPicture']);
            $email[] = $data['email'];
            $customerID[] = $data['customerID'];
        }


        $this->loadAdmin('agegroupsdata',[
            'monthlyCitySpending' => $AgeGroupsDataAnalytics['monthCitySpending'],
            'gender' => $gender,
            'genderPercentage' => $genderPercentage,
    
           
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
            'customerID' =>$customerID
        ]);
    }
}
?>