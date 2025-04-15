<?php
class Controller {
    public function loadmodel($model){
        require_once "../models/{$model}.php";
        return new $model;
    }

    public function loadView($view,$data = []){
        extract($data);
        include "../views/layouts/asset.php";
        include "../views/layouts/header.php";
        include "../views/{$view}.php";
        include "../views/layouts/footer.php";
        include "../views/layouts/asset2.php";
    }
}
?>