<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__. '/../models/User.php';

class UsersController {
    private $user;
    private $session;
    public $redirectUrl;
    public $errors = [];

    public function __construct($user, $session) {
        $this->user = $user;
        $this->session = $session;
        $this->redirectUrl = null;
    }

    public function index() {
        // pagination
        $page = (int) ($_GET['page'] ?? 1);
        $limit = (int) ($_GET['limit'] ?? 10);
        $offset = ($page - 1) * $limit;

        // sorting
        $sortField = $_GET['sort'] ?? 'name';
        $sortOrder = $_GET['order'] ?? 'asc'; 

        $users = $this->user->getAll($limit, $offset, $sortField, $sortOrder);
        $totalUsers = $this->user->getTotalCount();

        $totalPages = ceil($totalUsers / $limit);

        include __DIR__ . '/../views/backend/users/index.php';
    }

    public function addUser(){
        if (!$this->requireAdmin()) {
            header('Location: ' . $this->redirectUrl);
            return;
        }

        include __DIR__ . '/../views/backend/users/create.php';
    }
   
    public function viewUser(){
        $id = $_GET['id'] ?? null;
        if (!$id) {
            return $this->errorResponse("User ID is required.");
        }

        $user = $this->user->getById($id);
        if (!$user) {
            return $this->errorResponse("User not found.");
        }

        include __DIR__ . '/../views/backend/users/show.php';
    }
    public function editUser(){
        if (!$this->requireAdmin()) {
            header('Location: ' . $this->redirectUrl);
            return;
        }

        $id = $_GET['id'] ?? null;
        if (!$id) {
            return $this->errorResponse("User ID is required.");
        }

        $user = $this->user->getById($id);
        if (!$user) {
            return $this->errorResponse("User not found.");
        }

        include __DIR__ . '/../views/backend/users/edit.php';
    }
    public function updateUser(){
        if (!$this->requireAdmin()) {
            header('Location: ' . $this->redirectUrl);
            return;
        }

        $id = $_GET['id'] ?? null;
        if (!$id) {
            return $this->errorResponse("User ID is required.");
        }

        $username = $_POST['username'];
        $role = $_POST['role'] ?? 'User';
        

        // validation
       $this->validateProductData($username, $role);

        if ($this->errors) {
            include __DIR__ . '/../views/backend/users/edit.php';
            return;
        }

        $this->user->update($id, $username, $role);
        $this->redirectUrl = '/auth/users';
        header('Location: ' . $this->redirectUrl);
    }
    public function deleteUser(){
        if (!$this->requireAdmin()) {
            header('Location: ' . $this->redirectUrl);
            return;
        }

        $id = $_GET['id'] ?? null;
        if (!$id) {
            return $this->errorResponse("User ID is required.");
        }

        $this->user->delete($id);
        header('Location: /auth/users');
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

    private function validateProductData($username, $role) {
        if (empty($username)) {
            $this->errors[] = "User name is required.";
        }

        if (empty($role)) {
            $this->errors[] = "Role is required.";
        }
       
    }
}