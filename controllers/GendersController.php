<?php
class GendersController extends Controller{
    private $gendersController;
    public function __construct(){
        $this->gendersController = new GendersModel();
    }

    public function Genders(){
        if (isset($_SESSION['user']['user_id']) && $_SESSION['user']['admin'] === false) {
            header("Location: ../public/index.php?action=dashboarduser");
            exit();
        }

        $gendersData = $this->gendersController->genderTableHandler();

        $genders = [];
        $gendersPercentage= [];

        foreach($gendersData['gendersData'] as $data){
            $genders[] = $data['genders'];
            $gendersPercentage[] = $data['genderPercentage'];
        }


        $this->loadAdmin('genders',[
            'genders' => $genders,
            'gendersPercentage' => $gendersPercentage
        ]);
    }

}
?>