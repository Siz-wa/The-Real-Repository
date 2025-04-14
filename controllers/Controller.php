<?php
class Controller {
    public function loadmodel($model){
        require_once "../models/{$model}.php";
        return new $model;
    }

    public function loadView($view,$data = []){
        extract($data);
        require_once "../views/layouts/asset.php";
        require_once "../views/layouts/header.php";
        require_once "../views/{$view}.php";
        require_once "../views/layouts/footer.php";
        require_once "../views/layouts/asset2.php";
    }
}
?>