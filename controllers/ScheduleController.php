<?php 
class ScheduleController extends Controller{
   private $weeks = [];
   private $scheduleModel;
   private $productModel;
   private $subscriptionModel;
    public function __construct(){
        $this->scheduleModel = new ScheduleModel();
        $this->productModel = new ProductModel();
        $this->subscriptionModel = new UsersModel();

    }

    public function Schedule(){
     
        $customerID =$_SESSION['user']['user_id'];
        $data = $this->scheduleModel->scheduleHandler($customerID);
        $products = $this->productModel->getProduct();
        $subscriptionResult = $this->subscriptionModel->getSubscriptionData($customerID);
       

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json'); // Send JSON response
    
            if (isset($_POST['productID'],$_POST['orderDate'])) {
                $PID = $_POST['productID'];
                $Odate = $_POST['orderDate'];
                $customerID = $_SESSION['user']['user_id'];
    
                // Attempt to subscribe
                $scheduleOrder = $this->scheduleModel->scheduleOrder($customerID, $Odate);

                $this->scheduleModel->insert($PID,$scheduleOrder);
    
                if (isset($subscriptionResult['error'])) {
                    echo json_encode(['error' => $scheduleOrder['error']]);
                    exit;
                }
    
                echo json_encode(['success' => true]);
                exit;
            }
    
            echo json_encode(['error' => 'You must choose a package of cookies or pastries!']);
            exit;
        }




        if(!$data['subsData']){
            echo json_encode(['error' => 'You have no valid subscription!']);
        }

         // If no subscription is found, return an empty array

        // Initialize start and end dates for the subscription
        $start = new DateTime($data['subsData']['startDate']);
        $end = new DateTime($data['subsData']['endDate']);

        if ($start->format('N') !== '1') {
            $start->modify('next monday');
        }

        while($start <= $end){
            $weekStart = clone $start;
            $weekEnd = (clone $weekStart)->modify('+6 days');

            $orderData = $this->scheduleModel->findWeeklyOrder($customerID,$weekStart,$weekEnd);

            $this->weeks[] = [
                'week_start' => $weekStart->format('Y-m-d'),
                'week_end'   => $weekEnd->format('Y-m-d'),
                'status'     => $orderData ? 'Scheduled' : 'Available'
            ];

            $start -> modify('+ 7 days');

        }


        $standard = [];
        $premium = [];
       

        foreach($products as $product){
            if($product['planID'] === 1){
                $standard[] = $product;
            }
            else if($product['planID'] === 2){
                $premium[] = $product;
            }
        }

        if($subscriptionResult['planID']===1){
            $availableProduct = $standard;
        }
        else if($subscriptionResult['planID']===2){
            $availableProduct = $premium;
        }
        else{
            $availableProduct = $products;
           
        }

        


        

        $this->loadAdmin('schedule',[
            'weeks' => $this->weeks,
            'products' => $availableProduct,
        ]);
        
    }
}
?>