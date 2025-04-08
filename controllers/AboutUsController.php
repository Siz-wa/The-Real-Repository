<?php
require_once "Controller.php";

class AboutUsController extends Controller{

    public function __construct(){
        // You can initialize any models or other dependencies here if needed
    }
    public function AboutUs(){
        $this->loadView('aboutus');
    }
}
?>