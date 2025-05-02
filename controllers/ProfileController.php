<?php 
class ProfileController extends Controller{
    public function __construct(){
        // blank at the moment
    }

    public function Profile(){
        if(!isset( $_SESSION['user']['user_id'])) {
            header("Location: ../public/index.php?action=home");
            exit;
        }

        if(isset($_SESSION['user']['admin']) && $_SESSION['user']['admin'] === false){
            $this->loadUserDashboard('profile');
        }else{
            $this->loadAdmin('profile');
        }
        
    }
}
?>