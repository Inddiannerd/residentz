<?php
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = getDBConnection();
    
    try {
        $sql = "INSERT INTO contact_submissions (name, email, message) 
                VALUES (:name, :email, :message)";

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':name' => $_POST['name'],
            ':email' => $_POST['email'],
            ':message' => $_POST['message']
        ]);

        echo json_encode(['success' => true]);
    } catch(PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}