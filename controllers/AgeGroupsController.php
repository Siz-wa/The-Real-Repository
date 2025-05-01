<?php
class AgeGroupsController extends Controller{
    private $ageGroupsModel;
    public function __construct(){
        $this->ageGroupsModel = new AgeGroupsModel();
    }

    public function AgeGroups(){
        if (isset($_SESSION['user']['user_id']) && $_SESSION['user']['admin'] === false) {
            header("Location: ../public/index.php?action=dashboarduser");
            exit();
        }

        $ageData = $this->ageGroupsModel->ageGroupsHandler();

        $ageGroups = [];
        $ageGroupsPercentage= [];

        foreach($ageData['ageGroupsData'] as $data){
            $ageGroups[] = $data['ageGroup'];
            $ageGroupsPercentage[] = $data['ageGroupPercentage'];
        }


        $this->loadAdmin('agegroups',[
            'genders' => $ageGroups,
            'gendersPercentage' => $ageGroupsPercentage
        ]);
    }

}
?>