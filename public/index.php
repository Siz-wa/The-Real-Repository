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
$router->addroute('dashboarduser','DashboardController','Dashboard');
$router->addroute('admindashboard','AdminDashboardController','AdminDashboard');
$router->addroute('logout','LogoutController','Logout');
$router->addroute('profile','ProfileController','Profile');
$router->addroute('demographics','DemographicsController','Demographics');
$router->addroute('cities','CitiesController','Cities');
$router->addroute('verifyaccount','VerifyAccountController','VerifyAccount');
$router->addroute('citydata','CityDataController','CityData');



$action = isset($_GET['action']) ? $_GET['action'] : 'home';

$router->dispatch($action);

?>