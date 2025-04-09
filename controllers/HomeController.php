<?php

class HomeController extends Controller{

  
    private $CustomerModel;
    
    public function __construct(){
        global $db;
        $this->CustomerModel = new Customer($db);
    }

    public function Home(){
        $customers = $this->CustomerModel->getAllCustomers();
        $this->loadView('home',['customers' => $customers]);
    }
}
?>