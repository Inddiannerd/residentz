<?php
require_once '../config/database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    try {
        $conn = getDBConnection();
        
        $sql = "INSERT INTO user (Email_id, Password, Name, Mobile_No, Gender) 
                VALUES (:email, :password, :name, :mobile, :gender)";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':email' => $data['email'],
            ':password' => (int)$data['password'],
            ':name' => $data['name'],
            ':mobile' => (int)$data['mobile'],
            ':gender' => $data['gender']
        ]);
        
        echo json_encode(['success' => true]);
    } catch(PDOException $e) {
        http_response_code(500);
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}
?>