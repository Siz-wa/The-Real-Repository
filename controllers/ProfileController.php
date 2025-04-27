<?php 
class ProfileController extends Controller{
    public function __construct(){
        // blank at the moment
    }

    public function Profile(){
        $this->loadUserDashboard('profile');
    }
}
?>