<?php
class AdminDashboardController extends Controller{

    private $adminDashboardModel;
    public function __construct(){
        $this->adminDashboardModel = new AdminDashboardModel();   
    }

    public function AdminDashboard(){
        $status = 'Processing';
        if (isset($_SESSION['user']['user_id']) && $_SESSION['user']['admin'] === false ) {
            header("Location: ?action=dashboarduser");
            exit();
        }else if(!isset( $_SESSION['user']['admin'])) {
            header("Location: ?action=home");
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
        // Format data for the view
        $categories = [];
        $percetage = [];
        foreach ($analyticsData['salesByCat'] as $data) {
            $categories[] = $data['category_name'];
            $percentage[] = $data['percentage'];
        }
        // calculationg the profit
        $profit = $analyticsData['totalRevenue'] - $analyticsData['totalExpenses'];

       


        $this->loadAdmin('adminDashboard', [
            'monthlyRevenue' => $analyticsData['monthlyRevenue'],
            'totalRevenue' => $analyticsData['totalRevenue'],
            'monthlyExpenses' => $analyticsData['monthlyExpenses'],
            'totalExpenses' => $analyticsData['totalExpenses'],
            'categories' => $categories,
            'percentage' => $percentage,
            'totalOrder' => $analyticsData['totalOrder'],
            'monthlyOrder' => $analyticsData['monthlyOrder'],
            'profit' => $profit,
            'currentWeek' => $analyticsData['currentWeek'],
            'lastWeek' => $analyticsData['lastWeek'],
            'recentOrders' => $analyticsData['recentOrders'],
            'topProd' => $analyticsData['topProd'],
            'courier' => $analyticsData['courier'],
        ]);
    }

    
}
?>