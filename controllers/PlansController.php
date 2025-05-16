<?php

require_once '../controllers/Controller.php';
require_once '../models/PlansModel.php';
require_once '../config/Database.php';

class PlansController extends Controller{
    private $PlansModel;
    public function __construct(){
       $this->PlansModel = new PlansModel();
    }
    public function Plans(){
        if (isset($_SESSION['user']['user_id']) && $_SESSION['user']['admin'] === false ) {
            header("Location: ?action=dashboarduser");
            exit();
        }else if(!isset( $_SESSION['user']['admin'])) {
            header("Location: ?action=home");
        }

        $plansData = $this->PlansModel->plansHandler();
        
        foreach($plansData['plans'] as $data){
            $data['price'] = number_format($data['price'], 2);
        }
        
        $this->loadAdmin('plans',[
            'plansData' => $plansData['plans']
        ]);
    }

    public function update(){

        header('Content-Type: application/json');

        $data = json_decode(file_get_contents("php://input"), true);
        
        if (!isset($data['id'])) {
            echo json_encode(['message' => 'Missing plan ID']);
            exit;
        }
        
       
        $result = $this->PlansModel->updatePlans($data);
        
        if ($result) {
            echo json_encode(['message' => 'Plans updated']);
        } else {
            echo json_encode(['message' => 'Failed to update Plans']);
        }

    }


    public function add(){
        
           

        header('Content-Type: application/json');

        $data = json_decode(file_get_contents("php://input"), true);
        

        

        if (!$data) {
            echo json_encode(['message' => 'Invalid data']);
            exit;
        }
              
        $result = $this->PlansModel->addPlans($data);
    
        if ($result) {
            echo json_encode(['message' => 'Plans added']);
        } else {
            echo json_encode(['message' => 'Failed to add Plans']);
        }
    }



    public function delete() {
        header('Content-Type: application/json');

        // Make sure it's a POST request
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['message' => 'Method not allowed']);
            return;
        }

        // Read input JSON
        $input = json_decode(file_get_contents('php://input'), true);

        if (!isset($input['id'])) {
            http_response_code(400);
            echo json_encode(['message' => 'Missing ID']);
            return;
        }

        $result = $this->PlansModel->deletePlans($input['id']);

        if ($result) {
            echo json_encode(['message' => 'Plans deleted']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Failed to delete Plans']);
        }
    }
}
?>