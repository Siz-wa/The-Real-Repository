<?php
require_once "Controller.php";

class LoginController extends Controller{

    public function __construct(){
        // You can initialize any models or other dependencies here if needed
    }
    public function Login(){
        $this->loadView('login');
    }
}
?>