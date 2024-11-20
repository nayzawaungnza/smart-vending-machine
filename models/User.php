<?php
class User {
    private $conn;
    private $table = 'users';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Retrieve a single user by username
    public function getByUsername($username) {
        $sql = "SELECT * FROM " . $this->table . " WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create a new user
    public function create($username, $password, $role) {
        $sql = "INSERT INTO " . $this->table . " (username, password, role) VALUES (:username, :password, :role)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);
        return $stmt->execute();
    }

    
    /**
     * Get all products
     */
    public function getAll($limit, $offset, $sortField, $sortOrder) {
        $allowedFields = ['username', 'password', 'role'];
        $allowedOrder = ['asc', 'desc'];

        // Only valid fields and order are used
        if (!in_array($sortField, $allowedFields)) {
            $sortField = 'username';
        }
        if (!in_array($sortOrder, $allowedOrder)) {
            $sortOrder = 'asc';
        }

        $query = "SELECT * FROM " . $this->table . " ORDER BY {$sortField} {$sortOrder} LIMIT :limit OFFSET :offset";
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

    public function getById($id) {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $username, $role) {
        $sql = "UPDATE " . $this->table . " SET username = :username, role = :role WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        return $stmt->execute();
    }
    
    public function delete($id) {
        $sql = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

}