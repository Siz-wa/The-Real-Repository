<?php
require_once "Controller.php";

class ServicesController extends Controller{

    public function __construct(){
       
    }
    public function Services(){
        $this->loadView('services1');
    }
}
?>