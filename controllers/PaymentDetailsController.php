<?php


class PaymentDetailsController extends Controller{
    private $paymentDetailsModel;
    public function __construct(){
        $this->paymentDetailsModel = new PaymentDetailsModel();
    }
    public function PaymentDetails(){
      

        $paymentID = $_GET['paymentID'];

        $paymentDetails = $this->paymentDetailsModel->paymentDetailsHandler($paymentID);

        $this->loadAdmin('paymentdetails', [
            'paymentDetails' => $paymentDetails['paymentDetails']
      
        ]);
    }
}
?>