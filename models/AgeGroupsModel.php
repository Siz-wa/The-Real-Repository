<?php
class AgeGroupsModel extends DemographicsModel{
    private $conn;
    public function __construct(){
        parent::__construct();
    }

    public function ageGroupsHandler(){
        $ageGroupsData = $this->getAgePercentage();

        return [
            'ageGroupsData' => $ageGroupsData
        ];
    }

 
}
?>