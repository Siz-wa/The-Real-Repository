<?php
class AdminDashboardController extends Controller{

    private $adminDashboardModel;

    public function __construct(){
        $this->adminDashboardModel = new AdminDashboardModel();   
    }

    public function AdminDashboard(){
        $status = 'Processing';
        if (isset($_SESSION['user']['user_id']) && $_SESSION['user']['admin'] === false) {
            header("Location: ../public/index.php?action=dashboarduser");
            exit();
        }
 
        
        // foreach($testing as $test){
        //     $orderID = $test['orderID'];
        //     $productName = $test['productName'];
        //     $qty = $test['qty'];
        //     $costPerUnit = $test['cost_per_unit'];

        //     $totalCost = $costPerUnit * $qty;
        //     $desc = "Expense for product '$productName' in order #$orderID";
        //     $category = "Order Expense";

        //     $this->adminDashboardModel->insertExpenses($category, $desc, $totalCost, $orderID);

        // }
        $analyticsData = $this->adminDashboardModel->adminDashboardHandler();

        $this->loadAdmin('adminDashboard', [
            'monthlyRevenue' => $analyticsData['monthlyRevenue'],
            'totalRevenue' => $analyticsData['totalRevenue'],
            'monthlyExpenses' => $analyticsData['monthlyExpenses']
        ]);
    }

    
}
?>