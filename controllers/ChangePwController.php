<?php
require_once "Controller.php";

class ChangePwController extends Controller{

    public function __construct(){
        // You can initialize any models or other dependencies here if needed
    }
    public function ChangePwd(){
        $this->loadView('changepw');
    }
}
?>