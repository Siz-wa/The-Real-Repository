<?php
session_start();
spl_autoload_register(function($class) {
    $paths = ["../controllers", "../models", "../config","../routers"];
    foreach ($paths as $path) {
        $file = "$path/$class.php";
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});


$router = new Router();

$router->addroute('home','HomeController','Home');
$router->addroute('faqs','FAQSController','Faqs');
$router->addroute('changepw','ChangePwController','ChangePwd');
$router->addroute('aboutus','AboutUsController','AboutUs');
$router->addroute('register','RegisterController','Register');
$router->addroute('login','LoginController','Login');
$router->addroute('services1','ServicesController','Services');
$router->addroute('contact','ContactController','Contact');
$router->addroute('forgotpw','ForgotPwController','ForgotPw');



$action = isset($_GET['action']) ? $_GET['action'] : 'home';

$router->dispatch($action);

?>