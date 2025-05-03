<?php


class PaymentDetailsController extends Controller{
    private $paymentDetailsModel;
    public function __construct(){
        $this->paymentDetailsModel = new PaymentDetailsModel();
    }
    public function PaymentDetails(){
        if (isset($_SESSION['user']['user_id']) && $_SESSION['user']['admin'] === false ) {
            header("Location: ?action=dashboarduser");
            exit();
        }else if(!isset( $_SESSION['user']['admin'])) {
            header("Location: ?action=home");
        }

        $paymentID = $_GET['paymentID'];

        $paymentDetails = $this->paymentDetailsModel->paymentDetailsHandler($paymentID);

        $this->loadAdmin('paymentdetails', [
            'paymentDetails' => $paymentDetails['paymentDetails']
        ]);
    }
}
?>