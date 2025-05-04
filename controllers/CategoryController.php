<?php

require_once '../controllers/Controller.php';
require_once '../models/CategoryModel.php';
require_once '../config/Database.php';

class CategoryController extends Controller{
    private $categoryModel;
    public function __construct(){
       $this->categoryModel = new CategoryModel();
    }
    public function Category(){
        if (isset($_SESSION['user']['user_id']) && $_SESSION['user']['admin'] === false ) {
            header("Location: ?action=dashboarduser");
            exit();
        }else if(!isset( $_SESSION['user']['admin'])) {
            header("Location: ?action=home");
        }

        $categoryData = $this->categoryModel->categoryHandler();
        
        $this->loadAdmin('category',[
            'categoryData' => $categoryData['categoryData']
        ]);
    }

    public function update(){

        header('Content-Type: application/json');

        $data = json_decode(file_get_contents("php://input"), true);
        
        if (!isset($data['id'])) {
            echo json_encode(['message' => 'Missing category ID']);
            exit;
        }
        
       
        $result = $this->categoryModel->updateCat($data);
        
        if ($result) {
            echo json_encode(['message' => 'Category updated']);
        } else {
            echo json_encode(['message' => 'Failed to update category']);
        }

    }


    public function add(){
        
           

        header('Content-Type: application/json');

        $data = json_decode(file_get_contents("php://input"), true);
        

        

        if (!$data) {
            echo json_encode(['message' => 'Invalid data']);
            exit;
        }
              
        $result = $this->categoryModel->addCat($data);
    
        if ($result) {
            echo json_encode(['message' => 'Category added']);
        } else {
            echo json_encode(['message' => 'Failed to add category']);
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

        $result = $this->categoryModel->deleteCat($input['id']);

        if ($result) {
            echo json_encode(['message' => 'Category deleted']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Failed to delete category']);
        }
    }
}
?>