<?php
require_once "Controller.php";




class FAQSController extends Controller{

    public function faqs(){
        $this->loadView('faqs');
    }
}
?>