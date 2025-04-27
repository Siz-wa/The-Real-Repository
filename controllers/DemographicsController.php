<?php
class DemographicsController extends Controller{

    private $demographics;

    public function __construct(){
        $this->demographics = new DemographicsModel();
    }

    public function Demographics(){
        if (isset($_SESSION['user']['user_id']) && $_SESSION['user']['admin'] === false) {
            header("Location: ../public/index.php?action=dashboarduser");
            exit();
        }

        $demographicsData = $this->demographics ->demographicsHandler();

        // This is for gender datas
        $genderData = [];
        $percentageData = [];
        foreach ($demographicsData['genderData'] as $data) {
            $genderData[] = $data['gender'];  // Storing gender
            $percentageData[] = $data['percentage'];  // Storing percentage
        }

        // For age group data
        $ageGroupData = [];
        $ageGroupPercentage = [];
        foreach ($demographicsData['ageGroupPercentage'] as $data){
            $ageGroupData[] = $data['ageGroup'];
            $ageGroupPercentage[] = $data['ageGroupPercentage'];
        }

        // For Top Cities

        $cities= [];
        $cityPercentage= [];

        foreach ($demographicsData['topCities'] as $data){
            $cities[] = $data['city'];
            $cityPercentage[] = $data['cityPercentage'];
        }

        $this->loadAdmin("demographics",
        [
            'gender' => $genderData,
            'percentage' => $percentageData,
            'ageGroup' => $ageGroupData,
            'ageGroupPercentage' => $ageGroupPercentage,
            'cities' => $cities,
            'cityPercentage' => $cityPercentage
        ]);
    }

    
}
?>