<?php
class LogoutController extends Controller{

    public function __construct(){
        // Blank at the moment
    }

    public function Logout(){
        session_unset();
        session_destroy();

        header("Location: ../public/index.php?action=home");
        exit;
    }
}
?>