<?php


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

        $orderID = $_GET['orderID'];

        $orderDetails = $this->orderDetailsModel->orderDetailsHandler($orderID);

        $this->loadAdmin('orderdetails',[
            'orderDetails' => $orderDetails['orderDetails']
        ]);
    }
}
?>