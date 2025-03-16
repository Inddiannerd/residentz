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
            ':mobile' => (int)$_POST['mobile'],  // Convert to INT for database
            ':password' => (int)$_POST['password'] // Convert to INT for database
        ]);

        echo json_encode(['success' => true]);
    } catch(PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}