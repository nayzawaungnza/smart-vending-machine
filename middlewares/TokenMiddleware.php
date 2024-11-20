<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class TokenMiddleware {
    private $secretKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c';

    public function verifyToken() {
        $headers = getallheaders();
        $authHeader = $headers['Authorization'] ?? '';

        if (preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            $jwt = $matches[1];
            try {
                $decoded = JWT::decode($jwt, new Key($this->secretKey, 'HS256'));
                return $decoded;  // returns payload if valid
            } catch (Exception $e) {
                http_response_code(401);
                echo json_encode(['error' => 'Unauthorized']);
                exit;
            }
        } else {
            http_response_code(401);
            echo json_encode(['error' => 'Token not provided']);
            exit;
        }
    }
}
?>