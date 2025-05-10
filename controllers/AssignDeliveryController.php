<?php
class AssignDeliveryController extends Controller{
    private $assignDeliveryModel;
    public function _contruct(){
        $this->assignDeliveryModel = new AssignDeliveryModel();
    }

    public function AssignDelivery(){
        $this->loadAdmin('assigndelivery');
    }
}

    
?>