<?php
require_once '../config/database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    try {
        $conn = getDBConnection();
        
        $sql = "SELECT u.*, m.amount as maintenance_due 
                FROM user u 
                LEFT JOIN maintenance m ON u.E_ID = m.user_id 
                WHERE u.E_ID = :id";
                
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $_GET['id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            echo json_encode([
                'success' => true,
                'societyName' => 'Your Society',
                'address' => $user['address'] ?? 'Welcome to your digital society management dashboard',
                'maintenanceDue' => $user['maintenance_due'] ?? '5000'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'error' => 'User not found'
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