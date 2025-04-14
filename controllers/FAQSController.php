<?php
require_once "Controller.php";




class FAQSController extends Controller{

    public function __construct(){
        // You can initialize any models or other dependencies here if needed
    }

    public function Faqs(){
        $this->loadView('faqs');
    }
}
?>