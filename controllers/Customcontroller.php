<?php
require_once "Controller.php";
require_once "../models/Customer.php";



class Customcontroller extends Controller{

  
    private $CustomerModel;
    
    public function __construct(){
        global $db;
        $this->CustomerModel = new Customer($db);
    }

    public function index(){
        $customers = $this->CustomerModel->getAllCustomers();
        $this->loadView('home',['customers' => $customers]);
    }
}
?>