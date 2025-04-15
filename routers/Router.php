<?php
class Router {

    

    private $routes = [];
    // 


    // Constructor to initialize the routes array
    public function addroute($action,$controller,$method) {
        $this->routes[$action] = [
            'controller' => $controller,
            'method' => $method 
        ];
    }

    // Method to dispatch the request to the appropriate controller and method 
    // based on the action parameter in the URL
    // This method is responsible for loading the correct controller and calling the appropriate method
    public function dispatch($action){
        if (isset($this -> routes[$action])){
            $controllerName = $this->routes[$action]['controller'];
            $method = $this->routes[$action]['method'];

            $controllerFile = "../controllers/$controllerName.php";
            
            // Check if the controller file exists before including it
            // This is a security measure to prevent directory traversal attacks
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


//  4/8/2025 4:14pm natapos ko yung problema which is walang php tag ang Router file kaya di nya natatanggap yung data na na nirerequest ng index
// tapos ang hirap pa hanapin ng path files ng mga controllers dahil mali pala ang naka set up na path files dun  variable n $controllerFiles
// Dito ako nagtatapos tinanggal ko ang htaccess file for the mean time.
// may bagong problema akong nakita which is yung each sa index di nya nakukuha yung action variable sa link.
// im still thinking kung paano ko sya maayos
// dito ko muna to ititigil 4:18pm 4/8/25

// ------------------------------------------------


?>
