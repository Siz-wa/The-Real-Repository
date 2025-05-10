<?php
require_once '../controllers/Controller.php';

class PaymentController extends Controller{
    private $paymentModel;
    public function __construct(){
        $this->paymentModel = new PaymentModel();
    }
    public function Payment() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json'); // Send JSON response
    
            if (isset($_POST['price'], $_POST['planID'], $_POST['type'])) {
                $price = $_POST['price'];
                $planID = $_POST['planID'];
                $type = $_POST['type'];
                $customerID = $_SESSION['user']['user_id'];
    
                // Attempt to subscribe
                $subscriptionResult = $this->paymentModel->subscribe($customerID, $type, $planID);
    
                if (isset($subscriptionResult['error'])) {
                    echo json_encode(['error' => $subscriptionResult['error']]);
                    exit;
                }
    
                // Process payment only after valid subscription
                $this->paymentModel->pay($customerID, $price, $planID, $type);
    
                echo json_encode(['success' => true]);
                exit;
            }
    
            echo json_encode(['error' => 'Missing required fields.']);
            exit;
        }
    
        // GET request: show payment form
        $plan = $_GET['plan'];
        $details = $this->paymentModel->paymentHandler($plan);
        $this->loadView('payment', [
            'plans' => $details['plan']
        ]);
    }
}
?>