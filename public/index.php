<?php

spl_autoload_register(function($class) {
    $paths = ["../controllers", "../models", "../config"];
    foreach ($paths as $path) {
        $file = "$path/$class.php";
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});


$router = new Router();

$router->addroute('home','Customcontroller','index');
$router->addroute('faqs','FAQSController','faqs');



$action = isset($_GET['action']) ? $_GET['action'] : 'home';

$router->dispatch($action);

?>