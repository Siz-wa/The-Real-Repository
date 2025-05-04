<?php
require_once "Controller.php";

class ServicesController extends Controller{
    private $serviceModel;
    public function __construct(){
       $this->serviceModel = new ServiceModel();
    }
    
    public function Services(){
        $plans = $this->serviceModel->serviceHandler();

        $planName= [];
        $description = [];
        $type = [];
        $this->loadView('services1', [
            'plans' => $plans['plansData'],
        ]);
    }
}
?>