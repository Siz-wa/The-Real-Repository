<?php

class DeliverEndModel{

  
    private $conn;
    
    public function __construct(){
      
        $this->conn = Database::getInstance()->getConnection();
    }

    public function deliverEndHandler(){
      
    }
}
?>