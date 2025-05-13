<?php 
require_once '../controllers/OrderDetailsController.php';
header('Content-Type: application/json');
$controller = new OrderDetailsController();

$controller -> confirmdelivery();

?>