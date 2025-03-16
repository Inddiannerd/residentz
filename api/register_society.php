<?php
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = getDBConnection();
    
    try {
        $sql = "INSERT INTO maintenance (M_ID, Name, Email_id, Mobile_No, Password) 
                VALUES (NULL, :name, :email, :mobile, :password)";

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':name' => $_POST['name'],
            ':email' => $_POST['email'],
            ':mobile' => (int)$_POST['mobile'],
            ':password' => (int)$_POST['password']
        ]);

        echo json_encode(['success' => true]);
    } catch(PDOException $e) {
        http_response_code(500);
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}
