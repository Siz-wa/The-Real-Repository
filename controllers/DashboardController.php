<?php
class DashboardController extends Controller{

    public function __construct() {
        // Initialize any dependecies here
    }

    public function Dashboard() {

        if (isset($_SESSION['user']['user_id']) && $_SESSION['user']['admin'] === true) {
            header("Location: ?action=admindashboard");
            exit();
        }
        // Load the dashboard view
        $this->loadUserDashboard('dashboarduser');
    }

}
?>