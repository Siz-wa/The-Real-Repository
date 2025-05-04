<?php
require_once '../controllers/Controller.php';
require_once '../models/ProductModel.php';
require_once '../config/Database.php';

class ProductController extends Controller{
    private $ProductModel;
    public function __construct(){
        $this->ProductModel = new ProductModel();
    }
    public function Product(){
        if (isset($_SESSION['user']['user_id']) && $_SESSION['user']['admin'] === false ) {
            header("Location: ?action=dashboarduser");
            exit();
        }elseif(!isset($_SESSION['user']['user_id'])){
            header("Location: ?action=home");
            exit;
        }

        $employeesData = $this->ProductModel->productHandler();

        
        $this->loadAdmin('Product', [
            'cats' => $employeesData['cats'],
            'productInfo' => $employeesData['productInfo']
        ]);
    }

    public function update(){

        header('Content-Type: application/json');

        // Make sure it's a POST request
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['message' => 'Method not allowed']);
            return;
        }
    
        // Validate required fields
        if (
            !isset($_POST['name'], $_POST['email'], $_POST['role']) ||
            !isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK
        ) {
            http_response_code(400);
            echo json_encode(['message' => 'Missing fields or image upload error']);
            return;
        }

        
        // Read and prepare data
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'role' => $_POST['role'],
            'id' => $_POST['id'],
            'categoryID' =>$_POST['categoryID'],
            'image' => file_get_contents($_FILES['image']['tmp_name'])
        ];
    
        $result = $this->ProductModel->updateProduct($data);
    
        if ($result) {
            echo json_encode(['message' => 'Product updated']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Failed to update product']);
        }
    }

    public function add(){
        header('Content-Type: application/json');

        // Make sure it's a POST request
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['message' => 'Method not allowed']);
            return;
        }
    
        // Validate required fields
        if (
            !isset($_POST['name'], $_POST['email'], $_POST['role']) ||
            !isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK
        ) {
            http_response_code(400);
            echo json_encode(['message' => 'Missing fields or image upload error']);
            return;
        }
    
        // Read and prepare data
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'role' => $_POST['role'],
            'image' => file_get_contents($_FILES['image']['tmp_name'])
        ];
    
        $result = $this->ProductModel->addProduct($data);
    
        if ($result) {
            echo json_encode(['message' => 'Product added']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Failed to add product']);
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

        $result = $this->ProductModel->deleteProduct($input['id']);

        if ($result) {
            echo json_encode(['message' => 'User deleted']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Failed to delete user']);
        }
    }
}
?>