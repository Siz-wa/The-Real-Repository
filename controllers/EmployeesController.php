<?php
require_once '../controllers/Controller.php';
require_once '../models/EmployeesModel.php';
require_once '../config/Database.php';

class EmployeesController extends Controller{
    private $employeesModel;
    public function __construct(){
        $this->employeesModel = new EmployeesModel();
    }
    public function Employee(){
        if (isset($_SESSION['user']['user_id']) && $_SESSION['user']['admin'] === false ) {
            header("Location: ../public/index.php?action=dashboarduser");
            exit();
        }elseif(!isset($_SESSION['user']['user_id'])){
            header("Location: ../public/index.php?action=home");
            exit;
        }

        $employeesData = $this->employeesModel->EmployeesHandler();

        
        $this->loadAdmin('employees', [
            'adminInfo' => $employeesData['adminInfo']
        ]);
    }

    public function update(){

        header('Content-Type: application/json');

        $data = json_decode(file_get_contents("php://input"), true);
        
        if (!isset($data['id'])) {
            echo json_encode(['message' => 'Missing user ID']);
            exit;
        }
        
       
        $result = $this->employeesModel->updateEmployee($data);
        
        if ($result) {
            echo json_encode(['message' => 'User updated']);
        } else {
            echo json_encode(['message' => 'Failed to update user']);
        }

    }


    public function add(){
        
           

        header('Content-Type: application/json');

        $data = json_decode(file_get_contents("php://input"), true);
        

        $token = bin2hex(random_bytes(32));
        $subject = 'Password Reset Request'; 
        $mailbody = "
        <html>
        <body>
            <p>Dear Recruit,</p>
            <p>Thank you for waiting with Two Hearts Confections!</p>
            <p>We are thrilled to have you on board. Below are your login credentials:</p>
            <p><strong>Email:</strong> {$data['email']}</p>
            <p><strong>Password:</strong>".htmlspecialchars($token)."</p>
            <p>Please keep this information secure. If you did not create an account with us, please disregard this email or contact our support team if you have any concerns.</p>
            <p>Thank you for choosing Two Hearts Confections. We look forward to serving you!</p>
            <p>Best regards,<br>The Two Hearts Confections Team</p>
            <p>&copy; " . date('Y') . " Two Hearts Confections. All rights reserved.</p>
        </body>
        </html>";

        if (!$data) {
            echo json_encode(['message' => 'Invalid data']);
            exit;
        }
        
        
        $result = $this->employeesModel->addEmployee($data,$token);

        
        if ($result) {
            $this->sendEmail($data['email'],$mailbody,$subject);
            echo json_encode(['message' => 'User added']);
        } else {
            echo json_encode(['message' => 'Failed to add user']);
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

        $result = $this->employeesModel->deleteEmployee($input['id']);

        if ($result) {
            echo json_encode(['message' => 'User deleted']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Failed to delete user']);
        }
    }
}
?>