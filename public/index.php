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
$router->addroute('schedule','ScheduleController','Schedule');
$router->addroute('demographics','DemographicsController','Demographics');
$router->addroute('cities','CitiesController','Cities');
$router->addroute('verifyaccount','VerifyAccountController','VerifyAccount');
$router->addroute('citydata','CityDataController','CityData');
$router->addroute('users','UsersController','Users');
$router->addroute('orderdetails','OrderDetailsController','OrderDetails');
$router->addroute('paymentdetails','PaymentDetailsController','PaymentDetails');
$router->addroute('genders','GendersController','Genders');
$router->addroute('genderdata','GenderDataController','GenderData');
$router->addroute('agegroups','AgeGroupsController','AgeGroups');
$router->addroute('agegroupsdata','AgeGroupsDataController','AgeGroupsData');
$router->addroute('administrator','AdministratorController','Administrator');
$router->addroute('employees','EmployeesController','Employee');
$router->addroute('product','ProductController','Product');
$router->addroute('category','CategoryController','Category');
$router->addroute('plans','PlansController','Plans');
$router->addroute('payment','PaymentController','Payment');
$router->addroute('assigndelivery','AssignDeliveryController','AssignDelivery');
$router->addroute('orderfulfill','OrderFulfillController','OrderFulfill');
$router->addroute('deliver','DeliverController','Deliver');



$action = isset($_GET['action']) ? $_GET['action'] : 'home';

$router->dispatch($action);

?>