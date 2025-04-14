<?php
require_once "Controller.php";

class ContactController extends Controller{

    public function __construct(){
        // You can initialize any models or other dependencies here if needed
    }
    public function Contact(){
        $this->loadView('contact');
    }
}
?>