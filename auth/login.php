<?php
require_once '../config/database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    try {
        $conn = getDBConnection();
        
        $sql = "SELECT * FROM user WHERE Email_id = :email AND Password = :password";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':email' => $data['email'],
            ':password' => (int)$data['password']
        ]);
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            echo json_encode([
                'success' => true,
                'userId' => $user['E_ID'],
                'userName' => $user['Name']
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'error' => 'Invalid credentials'
            ]);
        }
    } catch(PDOException $e) {
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'error' => 'Database error'
        ]);
    }
}