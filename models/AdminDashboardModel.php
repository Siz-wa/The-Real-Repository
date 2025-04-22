<?php
class AdminDashboardModel{
    private $conn;
    public function __construct(){
        $this->conn = Database::getInstance()->getConnection();
    }


    public function adminDashboardHandler(){
        $monthlyRevenue = $this->getMonthlyRevenue();
        $monthlyExpenses = $this->getMonthlyExpenses();
        $totalRevenue = $this->getTotalRevenue();

        return[
            'monthlyRevenue' => $monthlyRevenue,
            'totalRevenue' => $totalRevenue,
            'monthlyExpenses' => $monthlyExpenses
        ];
    }

    public function getMonthlyRevenue()
    {
        $query = "
            SELECT 
                MONTH(created_at) AS month,
                SUM(amount) AS total
            FROM payment
            WHERE YEAR(created_at) = :currentYear
            GROUP BY MONTH(created_at)
            ORDER BY MONTH(created_at)
        ";

        $monthly = $this->conn->prepare($query);
        $monthly->execute([
            ':currentYear' => date('Y')
        ]);

        $monthlyData = $monthly->fetchAll(PDO::FETCH_ASSOC);

        // Fill in missing months with 0
        $result = array_fill(1, 12, 0);
        foreach ($monthlyData as $row) {
            $result[(int)$row['month']] = (float)$row['total'];
        }

        return array_values($result);
    }

    //FUNCTIONS FOR FETCHING REVENUES FROM DATABASE
    public function getTotalRevenue(){
        try {
            $query = "SELECT SUM(amount) AS total FROM payment";
            $total = $this->conn->prepare($query);
            $total->execute();
            $result = $total->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching total revenue: " . $e->getMessage());
            $result = ['total' => 0];
        }
        return $result['total'] ?? 0;
    }

    public function getOrderbyCategory(){
        
    }

    // FUNCTIONS FOR FETCHING ORDERS FROM DATABASE
   
    // public function getAllOrders($status) {
    //     $query = "
    //         SELECT o.orderID, op.productID, op.qty, p.productName, pi.cost_per_unit
    //         FROM orderr o
    //         JOIN order_product op ON o.orderID = op.orderID
    //         JOIN product p ON op.productID = p.productID
    //         JOIN prodingredient pi on p.productID = pi.productID
    //         WHERE o.status = 'Processing'
    //     ";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->execute();
    //     return $stmt->fetchAll();
    // }
    
    // FUNCTION FOR FETCHING EXPENSES FROM DATABASE
    // FUNCTION FOR FETCHING EXPENSES FROM DATABASE
    public function getMonthlyExpenses()
    {
        $query = "
            SELECT 
                MONTH(created_at) AS month,
                SUM(amount) AS total
            FROM expense
            WHERE YEAR(created_at) = :currentYear
            GROUP BY MONTH(created_at)
            ORDER BY MONTH(created_at)
        ";

        $monthly = $this->conn->prepare($query);
        $monthly->execute([
            ':currentYear' => date('Y')
        ]);

        $monthlyData = $monthly->fetchAll(PDO::FETCH_ASSOC);

        // Fill in missing months with 0
        $result = array_fill(1, 12, 0);
        foreach ($monthlyData as $row) {
            $result[(int)$row['month']] = (float)$row['total'];
        }

        return array_values($result);
    }

    // FUNCTION FOR INSERTING EXPENSES INTO DATABASE
    
    // public function insertExpenses($category, $desc, $totalCost, $orderID){
    //     $checkQuery = "SELECT COUNT(*) FROM expense WHERE orderID = ?";
    //     $stmt = $this->conn->prepare($checkQuery);
    //     $stmt->execute([$orderID]);
    //     $existingExpenses = $stmt->fetchColumn();
    
    //     // If no existing expenses, insert new one
    //     if ($existingExpenses == 0) {
    //         $query = "
    //             INSERT INTO expense (category, description, amount, expense_date, orderID)
    //             VALUES (?, ?, ?, NOW(), ?)
    //         ";
    //         $stmt = $this->conn->prepare($query);
    //         $stmt->execute([$category, $desc, $totalCost, $orderID]);
    //     }
    // }
}
?>