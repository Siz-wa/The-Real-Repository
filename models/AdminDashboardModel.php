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
        $totalExpenses = $this->getTotalExpenses();
        $salesByCat = $this->getSalesByCategory();
        $totalorder = $this->getAllOrders();
        $monthlyOrder = $this->getMonthlyOrder();
        $dailyOrder = $this->getDailyOrder();
        $recentOrders = $this->getRecentOrders();
        $topProd = $this->getTopProduct();

        return[
            'monthlyRevenue' => $monthlyRevenue,
            'totalRevenue' => $totalRevenue,
            'monthlyExpenses' => $monthlyExpenses,
            'totalExpenses' => $totalExpenses,
            'salesByCat' => $salesByCat,
            'totalOrder' => $totalorder,
            'monthlyOrder' => $monthlyOrder,
            'currentWeek' => $dailyOrder['currentWeek'],
            'lastWeek' => $dailyOrder['lastWeek'],
            'recentOrders' => $recentOrders,
            'topProd' => $topProd
        ];
    }

    // FETCHES ALL THE DAILY ORDERS
    public function getDailyOrder() {
        $salesData = [
            'Sun' => 0, 'Mon' => 0, 'Tue' => 0,
            'Wed' => 0, 'Thur' => 0, 'Fri' => 0, 'Sat' => 0
        ];
        $lastWeekData = $salesData;
    
        try {
            // Query for current week
            $queryCurrent = "
                SELECT 
                    DATE_FORMAT(created_at, '%a') AS day, 
                    COUNT(orderID) AS total
                FROM orderr
                WHERE created_at >= CURDATE() - INTERVAL 6 DAY
                GROUP BY day
            ";
    
            $stmtCurrent = $this->conn->prepare($queryCurrent);
            $stmtCurrent->execute();
            $rowsCurrent = $stmtCurrent->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rowsCurrent as $row) {
                $day = $row['day'] === 'Thu' ? 'Thur' : $row['day'];
                if (isset($salesData[$day])) {
                    $salesData[$day] = (int)$row['total'];
                }
            }
    
            // Query for last week
            $queryLastWeek = "
                SELECT 
                    DATE_FORMAT(created_at, '%a') AS day, 
                    COUNT(orderID) AS total
                FROM orderr
                WHERE created_at BETWEEN CURDATE() - INTERVAL 13 DAY AND CURDATE() - INTERVAL 7 DAY
                GROUP BY day
            ";
    
            $stmtLast = $this->conn->prepare($queryLastWeek);
            $stmtLast->execute();
            $rowsLast = $stmtLast->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rowsLast as $row) {
                $day = $row['day'] === 'Thu' ? 'Thur' : $row['day'];
                if (isset($lastWeekData[$day])) {
                    $lastWeekData[$day] = (int)$row['total'];
                }
            }
    
            // Return both series
            $orderedDays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat'];
    
            $currentWeekFinal = [];
            $lastWeekFinal = [];
    
            foreach ($orderedDays as $day) {
                $currentWeekFinal[] = $salesData[$day];
                $lastWeekFinal[] = $lastWeekData[$day];
            }
    
            return [
                'currentWeek' => $currentWeekFinal,
                'lastWeek' => $lastWeekFinal,
            ];
    
        } catch (PDOException $e) {
            error_log("Error fetching order data: " . $e->getMessage());
            return [];
        }
    }
    
    // FETCHES ALL RECENT ORDERS limit by 10
    public function getRecentOrders(){
        try{
            $query ="
            SELECT 
            o.orderID,o.created_at, o.status,
            c.fname, c.lname, c.pfPicture,
            p.productName
            FROM orderr o
            JOIN customer c on c.customerID = o.customerID
            JOIN order_product op on op.orderID = o.orderID
            JOIN product p on p.productID = op.productID
            ORDER BY o.created_at DESC
            LIMIT :limit
            ";
            $getRecent = $this->conn->prepare($query);
            $getRecent->bindValue(':limit', (int)10, PDO::PARAM_INT);
            $getRecent->execute();

            return $getRecent->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            error_log("Error fetching recent orders".$e->getMessage());
            return[];
        }
    }

    // FETCHES THE MONTHLY REVENUES FROM THE DATABASE
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
    // FUNCTIONS FOR FETHCING TOTAL EXPENSES FROM DATABASE
    public function getTotalExpenses(){
        try{
            $query ="SELECT SUM(amount) as totalExpenses FROM expense";
            $totalExpenses = $this->conn->prepare($query);
            $totalExpenses ->execute();

            $result= $totalExpenses->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            error_log("Error fetching total expenses".$e->getMessage());
            return[];
        }
        return $result['totalExpenses'];
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


    // GETTING ALL ORDERS FROM DATABASE 
    public function getAllOrders(){

        try{
            $query = "SELECT COUNT(*) as totalOrders FROM orderr ";
            $total = $this->conn->prepare($query);
            $total->execute();
            $row = $total->fetch(PDO::FETCH_ASSOC);
            $totalOrders = $row['totalOrders'];
            return $totalOrders;
        }catch(PDOException $e){
            error_log("Error fetching all orders".$e->getMessage());
            return [];
        }

    }

    public function getTopProduct(){
        try{
            $query ="
            SELECT p.productName,p.image,
            SUM(op.qty) as totalOrder,
            c.name as category
            FROM orderr o
            JOIN order_product op ON op.orderID = o.orderID
            JOIN product p ON p.productID = op.productID
            JOIN category c ON c.categoryID = p.categoryID
            WHERE o.status = :status
            GROUP BY op.productID
            ORDER BY totalOrder DESC
            LIMIT :limit
            ";
            $getTopProduct = $this->conn->prepare($query);
            $getTopProduct -> bindValue(':status', 'delivered', PDO::PARAM_STR);
            $getTopProduct -> bindValue(':limit', (int)10, PDO::PARAM_INT);
            $getTopProduct->execute();

            return $getTopProduct->fetchAll(PDO::FETCH_ASSOC);

        }catch(PDOException $e){
            error_log("Errors fetching the top ordered products");
            return[];
        }
    }

    public function getMonthlyOrder()
    {
        $query = "
            SELECT 
                MONTH(created_at) AS month,
                COUNT(orderID) AS total
            FROM orderr
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
    
    // FETCHING ORDERS FROM DATABASE BY CATEGORY
    public function getSalesByCategory() {
        try {
            $query = "
                SELECT 
                    c.name AS category_name, 
                    COUNT(op.orderID) AS totalOrder,
                    ROUND((COUNT(op.orderID) / (SELECT COUNT(*) FROM order_product)) * 100, 2) AS percentage
                FROM order_product op
                JOIN product p ON op.productID = p.productID
                JOIN category c ON p.categoryID = c.categoryID
                GROUP BY c.name
            ";
            $percentage = $this->conn->prepare($query);
            $percentage->execute();
            return $percentage->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching orders by category: " . $e->getMessage());
            return [];
        }
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