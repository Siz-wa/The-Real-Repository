<?php
require_once "Controller.php";

class RegisterController extends Controller{

    public function __construct(){
        // You can initialize any models or other dependencies here if needed
    }
    public function Register(){
        $this->loadView('register');
    }
}
?>