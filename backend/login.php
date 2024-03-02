<?php
session_start();
require 'conn.php';

// Check if user is already logged in
if(isset($_SESSION['user_id'])){
    header("Location: /CodeGenius/dashboard");
    exit(); // Stop further execution
}

// Check if database connection is successful
if($is_db_connected == true){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email_user_id = $_POST['email_user_id'];
        $password = $_POST['password'];

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE (email = :email OR user_id = :user_id) AND password = :password");
        $stmt->execute(['email' => $email_user_id, 'user_id' => $email_user_id, 'password' => $password]);

        $user = $stmt->fetch();
        if($user){
            // Regenerate session ID for security
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['user_id'];
            header("Location: /CodeGenius/dashboard.php");
            exit(); 
        } else {
            echo "<script type='text/javascript'>alert('Invalid email/user_id or password!');</script>";
        }
    }
    echo "Database connected successfully!";
} else {
    echo "Database not connected. Try again Later!";
}
?>
