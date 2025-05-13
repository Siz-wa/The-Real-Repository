<?php 

class DeliverEndController extends Controller{
    private $deliverEndModel;
    public function __construct(){
        $this->deliverEndModel = new DeliverEndModel();
    }
    public function DeliverEnd(){
        $this->loadView('deliverend');
    }
}
?>