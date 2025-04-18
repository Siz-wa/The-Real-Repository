<?php

class HomeController extends Controller{

  
    private $CustomerModel;
    
    public function __construct(){
      
        $this->CustomerModel = new Customer();
    }

    public function Home(){
        $customers = $this->CustomerModel->getAllCustomers();
        $this->loadView('home',['customers' => $customers]);
    }
}
?>