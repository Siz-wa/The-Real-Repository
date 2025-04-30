<?php
class VerifyAccountController extends Controller{
    private $verifyAccountModel;
    public function __construct(){
        $this-> verifyAccountModel = new VerifyAccountModel();
    }

    public function VerifyAccount(){
        $this->loadView('verifyaccount');
    }
}
?>