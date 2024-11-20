<?php
require_once __DIR__ . '/../config/Database.php';
//require_once __DIR__. '/../models/User.php';
require_once __DIR__. '/../models/Transaction.php';
//require_once __DIR__. '/../models/Product.php';

class TransactionsController {
   
    private $transaction;
    private $session;
    public $redirectUrl;
    public $errors = [];

    public function __construct( $transaction, $session) {
        $this->transaction = $transaction;
        $this->session = $session;
        $this->redirectUrl = null;
    }

    public function index() {
        if (!$this->requireAdmin()) {
            header('Location: ' . $this->redirectUrl);
            return;
        }
        
        // pagination
        $page = (int) ($_GET['page'] ?? 1);
        $limit = (int) ($_GET['limit'] ?? 10);
        $offset = ($page - 1) * $limit;

        // sorting
        $sortField = $_GET['sort'] ?? 'name';
        $sortOrder = $_GET['order'] ?? 'asc'; 

        $transactions = $this->transaction->getAll($limit, $offset, $sortField, $sortOrder);
        $totalTransactions = $this->transaction->getTotalCount();

        $totalPages = ceil($totalTransactions / $limit);

        
        include __DIR__ . '/../views/backend/transactions/index.php';
    }

    
    private function errorResponse($message) {
        echo 'Error: ' . $message;
        return;
    }
    
    // helper method to check authorization
    private function isAdmin() {
        return isset($this->session['user_role']) && $this->session['user_role'] === 'Admin';
    }

    // helper methods for unauthorized access
    private function requireLogin() {
        if (!isset($this->session['user_id'])) {
            header('Location: /auth/login');
            return;
        }
    }

    private function requireUser() {
        if ($this->isAdmin()) {
            header('Location: /auth/products');
            return;
        }
    }

    private function requireAdmin() {
        if (!isset($this->session['user_id'])) {
            $this->redirectUrl = '/auth/login';
            return false;
        }
        if (!$this->isAdmin()) {
            $this->redirectUrl = '/';
            return false;
        }
        return true;
    }
}