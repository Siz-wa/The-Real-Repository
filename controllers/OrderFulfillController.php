

<?php
require_once '../controllers/Controller.php';
require_once '../models/OrderFulfillModel.php';
require_once '../config/Database.php';

class OrderFulfillController extends Controller{
    private $orderfulfillModel;
    public function __construct(){
        $this->orderfulfillModel = new OrderFulfillModel();
    }

    public function OrderFulfill(){

        $deliveryData = $this->orderfulfillModel->assignDelivery();

        foreach($deliveryData['delivery'] as &$data){
            if ($data['image'] ||  $data['pfPicture']){
                $data['image'] = base64_encode($data['image']);
                $data['pfPicture'] = base64_encode($data['pfPicture']);
            }

            if($data['requiredDate']){
                $data['requiredDate'] = date("F j, Y", strtotime($data['requiredDate']));
            }
        }

        $this->loadAdmin('orderfulfill',[
            'delivery' => $deliveryData['delivery']
        ]);
    }

        public function fulfill()
        {
            header('Content-Type: application/json'); // Ensures JSON response
            ini_set('display_errors', 1); // Show errors in development
            error_reporting(E_ALL);

            $input = json_decode(file_get_contents('php://input'), true);

            if (!is_array($input)) {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
                return;
            }

            $successCount = 0;

            foreach ($input as $row) {
                if (!isset($row['orderID'], $row['CustomerID'])) {
                    continue; // Skip invalid rows
                }

                $success=$this->orderfulfillModel->updateOrderStatus($row);
                if ($success) $successCount++;
            }

            echo json_encode([
                'status' => $successCount === count($input) ? 'success' : 'partial',
                'message' => "$successCount of " . count($input) . " inserted"
            ]);
        }

}

    
?>