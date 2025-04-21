<?php
class DashboardController extends Controller{

    public function __construct() {
        // Initialize any dependecies here
    }

    public function Dashboard() {
        // Load the dashboard view
        $this->loadView2('dashboarduser');
    }

}
?>