<?php

class ServiceModel extends PlansModel{
   
    private $error = [];

    public function __construct(){
       parent::__construct(); 
    }

    public function serviceHandler(){
        $plansData = $this->getPlans();

        return [
            'plansData' => $plansData
        ];
    }

    
}
?>