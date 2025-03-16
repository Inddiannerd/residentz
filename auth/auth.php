<?php
session_start();
require_once '../config/database.php';

class Auth {
    private $conn;

    public function __construct() {
        $this->conn = getDBConnection();
    }

    public function register($data) {
        $sql = "INSERT INTO user (E_ID, Email_id, Password, Name, Mobile_No, Gender) 
                VALUES (NULL, :email, :password, :name, :mobile, :gender)";
        
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $data['email'],
                ':password' => (int)$data['password'], // Convert to INT(7)
                ':name' => $data['name'],
                ':mobile' => (int)$data['mobile'], // Convert to INT(10)
                ':gender' => $data['gender']
            ]);
            return true;
        } catch(PDOException $e) {
            return false;
        }
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM user WHERE Email_id = :email AND Password = :password";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':email' => $email,
            ':password' => (int)$password // Convert to INT for comparison
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION['user_id'] = $user['E_ID'];
            return true;
        }
        return false;
    }

    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    public function logout() {
        session_destroy();
    }
}
?>