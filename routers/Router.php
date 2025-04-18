<?php
class Router {

    private $routes = [];

    // Constructor to initialize the routes array
    public function addroute($action, $controller, $method) {
        $this->routes[$action] = [
            'controller' => $controller,
            'method' => $method
        ];
    }

    // Method to dispatch the request to the appropriate controller and method 
    // based on the action parameter in the URL
    public function dispatch($action) {
        if (isset($this->routes[$action])) {
            $controllerName = $this->routes[$action]['controller'];
            $method = $this->routes[$action]['method'];

            $controllerFile = "../controllers/$controllerName.php";
            
            // Check if the controller file exists before including it
            if (file_exists($controllerFile)) {
                require_once $controllerFile;
                $controller = new $controllerName();
            } else {
                echo "Controller file for $controllerName not found.";
                return;
            }


            if (method_exists($controller, $method)){
                $controller->$method();
            } else {
                echo "Method $method not found in controller $controllerName";
            }
        } else {
            echo "Action $action not found in routes";
        }
    }
}

?>
