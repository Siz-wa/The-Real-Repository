<?php
class CityDataController extends Controller{
    private $cityDataModel;

    public function __construct(){
        $this->cityDataModel = new CityDataModel();
    }

    public function CityData(){
        if (isset($_SESSION['user']['user_id']) && $_SESSION['user']['admin'] === false ) {
            header("Location: ../public/index.php?action=dashboarduser");
            exit();
        }else if(!isset( $_SESSION['user']['admin'])) {
            header("Location: ../public/index.php?action=home");
        }

        
        $cityName = $_GET['cityName'];

        $cityDataAnalytics = $this->cityDataModel->cityDataModelHandler($cityName);

        // gender distribution in in cities
        $gender = [];
        $genderPercentage = [];

        foreach($cityDataAnalytics['genderData'] as $data){
            $gender[] = $data['gender'];
            $genderPercentage[] = $data['percentage'];
        }
        // age distribution in cities

        $ageGroup = [];
        $ageGroupPercentage = [];

        foreach($cityDataAnalytics['ageGroupData'] as $data){
            $ageGroup[] = $data['ageGroup'];
            $ageGroupPercentage[] = $data['ageGroupPercentage'];
        }

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
        
        foreach($cityDataAnalytics['cityUserData'] as $data){
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


        $this->loadAdmin('citydata',[
            'monthlyCitySpending' => $cityDataAnalytics['monthCitySpending'],
            'gender' => $gender,
            'genderPercentage' => $genderPercentage,
            'ageGroup' => $ageGroup,
            'ageGroupPercentage' => $ageGroupPercentage,
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