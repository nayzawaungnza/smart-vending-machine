<?php

class Transaction {
    private $conn;
    private $table = 'transactions';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function logPurchase($userId, $productId, $quantity, $totalPrice) {
        $query = "INSERT INTO " . $this->table . " (user_id, product_id, quantity, total_price, purchase_date) 
                  VALUES (:user_id, :product_id, :quantity, :total_price, NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':product_id', $productId);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':total_price', $totalPrice);
        $stmt->execute();
    }

    /**
     * Get all products
     */
    public function getAll($limit, $offset, $sortField, $sortOrder) {
        $allowedFields = [
            'product_id',
            'user_id',
            'quantity',
            'total_price',
            'purchase_date',
            'username',
            'product_name'
        ];
        $allowedOrder = ['asc', 'desc'];
    
        // Validate sortField and sortOrder
        if (!in_array($sortField, $allowedFields)) {
            $sortField = 'username';
        }
        if (!in_array($sortOrder, $allowedOrder)) {
            $sortOrder = 'asc';
        }
    
        // Query with JOIN to get username and product name
        $query = "
            SELECT 
                p.*,
                u.username,
                pr.name AS product_name
            FROM {$this->table} p
            JOIN users u ON p.user_id = u.id
            JOIN products pr ON p.product_id = pr.id
            ORDER BY {$sortField} {$sortOrder}
            LIMIT :limit OFFSET :offset
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    /**
     * Get total product count for pagination
     */
    public function getTotalCount() {
        $query = "SELECT COUNT(*) as total FROM " . $this->table;
        $stmt = $this->conn->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total'];
    }
}
?>