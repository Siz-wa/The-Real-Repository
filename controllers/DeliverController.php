<?php
class DeliverController extends Controller{
    private $deliverModel;
    public function __construct(){
        $this->deliverModel = new DeliverModel();
    }

    public function Deliver(){
      
        $deliveryData = $this->deliverModel->deliverHandler($employeeID = $_SESSION['user']['employeeID']);

         foreach($deliveryData['delivery'] as &$data){
            if ($data['image'] ||  $data['pfPicture']){
                $data['image'] = base64_encode($data['image']);
                $data['pfPicture'] = base64_encode($data['pfPicture']);
                $data['POD'] = base64_encode($data['POD']);
            }

            if($data['requiredDate']){
                $data['requiredDate'] = date("F j, Y", strtotime($data['requiredDate']));
            }
        }


        $this->loadAdmin('deliver',[
           'delivery' => $deliveryData['delivery']
        ]);
    }
















}
?>