<?php

require_once '../controllers/Controller.php';
require_once '../models/OrderDetailsModel.php';
require_once '../config/Database.php';
class OrderDetailsController extends Controller{
    private $orderDetailsModel;
    public function __construct(){
        $this->orderDetailsModel = new OrderDetailsModel();
    }
    public function OrderDetails(){
        if (isset($_SESSION['user']['user_id']) && $_SESSION['user']['admin'] === false ) {
            header("Location: ?action=dashboarduser");
            exit();
        }else if(!isset( $_SESSION['user']['admin'])) {
            header("Location: ?action=home");
        }
        if (isset($_POST["submit"])) {
            $orderID = $_GET['orderID'];
            $deliveryID = $_GET['DeliveryID'];
            $imageName = $_FILES["image"]["name"];
            $POD = file_get_contents($_FILES["image"]["tmp_name"]);

            $this->orderDetailsModel->confirmDelivery($orderID,$POD,$deliveryID);

        }
          $orderID = $_GET['orderID'];

        $orderDetails = $this->orderDetailsModel->orderDetailsHandler($orderID);
        $orderDetails['orderDetails']['POD'] = base64_encode($orderDetails['orderDetails']['POD']);

        $this->loadAdmin('orderdetails',[
            'orderDetails' => $orderDetails['orderDetails']
        ]);
    }

   
}
?>