<?php
require_once "Controller.php";

class ServicesController extends Controller{

    public function __construct(){
        // You can initialize any models or other dependencies here if needed
    }
    public function Services(){
        $this->loadView('services1');
    }
}
?>