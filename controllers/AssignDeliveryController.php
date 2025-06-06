

<?php
require_once '../controllers/Controller.php';
require_once '../models/AssignDeliveryModel.php';
require_once '../config/Database.php';

class AssignDeliveryController extends Controller{
    private $assignDeliveryModel;
    public function __construct(){
        $this->assignDeliveryModel = new AssignDeliveryModel();
    }

    public function AssignDelivery(){

        $deliveryData = $this->assignDeliveryModel->assignDelivery();

        foreach($deliveryData['delivery'] as &$data){
            if ($data['image'] ||  $data['pfPicture']){
                $data['image'] = base64_encode($data['image']);
                $data['pfPicture'] = base64_encode($data['pfPicture']);
            }

            if($data['requiredDate']){
                $data['requiredDate'] = date("F j, Y", strtotime($data['requiredDate']));
            }
        }

        $this->loadAdmin('assigndelivery',[
            'delivery' => $deliveryData['delivery']
        ]);
    }

        public function assign()
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
                if (!isset($row['employeeID'], $row['orderID'], $row['CustomerID'])) {
                    continue; // Skip invalid rows
                }

                $success = $this->assignDeliveryModel->insertDelivery($row);
                $this->assignDeliveryModel->updateOrderStatus($row['orderID']);
                if ($success) $successCount++;
            }

            echo json_encode([
                'status' => $successCount === count($input) ? 'success' : 'partial',
                'message' => "$successCount of " . count($input) . " inserted"
            ]);
        }

}

    
?>