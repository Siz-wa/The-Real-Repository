<?php
class CitiesController extends Controller{
    private $citiesModel;
    public function __construct(){
        $this->citiesModel = new CitiesModel();
    }

    public function Cities(){
        if (isset($_SESSION['user']['user_id']) && $_SESSION['user']['admin'] === false) {
            header("Location: ../public/index.php?action=dashboarduser");
            exit();
        }

        $cityData = $this->citiesModel->cityTableHandler();

        $cityName = [];
        $cityPercentage= [];

        foreach($cityData['cityData'] as $data){
            $cityName[] = $data['city'];
            $cityPercentage[] = $data['cityPercentage'];
        }


        $this->loadAdmin('cities',[
            'cityName' => $cityName,
            'cityPercentage' => $cityPercentage
        ]);
    }

}
?>