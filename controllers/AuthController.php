<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__. '/../models/User.php';

class AuthController {
    private $user;
    private $session;

    public function __construct($user, $session) {
        $this->user = $user;
        $this->session = $session;
    }

    public function registerPage() {
        include __DIR__. '/../views/auth/register.php';
    }

    public function register() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'] ?? 'User';
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->user->create($username, $hashedPassword, $role);
        header('Location: /auth/login');
    }

    // Show login form
    public function loginPage() {
        if (isset($_SESSION['user_id'])) {
            // Redirect based on user role
            if ($_SESSION['user_role'] === 'Admin') {
                header("Location: /auth/products");
            } else {
                header("Location: /products"); // Or any home page for non-admin users
            }
            exit; // Ensure no further code executes after redirect
        }
        include __DIR__ . '/../views/auth/login.php';
    }

    public function login() {

        
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->user->getByUserName($username);

        // Verify password
        if ($user && password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_role'] = $user['role'];

            if ($user['role'] === 'Admin') {
                header("Location: /auth/products");
            } else {
                header("Location: /products"); // Or any home page for non-admin users
            }
        } else {
            $this->errors[] = "Invalid username or password.";
            
            //return;
        }
        include __DIR__ . '/../views/auth/login.php';
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: /auth/login");
    }
}
?>