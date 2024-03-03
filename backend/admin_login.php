<?php
session_start();
require 'conn.php';

// Check if Admin is already logged in
if(isset($_SESSION['admin_id'])){
    header("Location: /CodeGenius/admin_dashboard");
    exit(); // Stop further execution
}

// Check if database connection is successful
if($is_db_connected == true){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email_user_id = $_POST['email_user_id'];
        $password = $_POST['password'];

        // Use prepared statements to prevent SQL injection
        if (filter_var($email_user_id, FILTER_VALIDATE_EMAIL)) {
            $stmt = $conn->prepare("SELECT * FROM admins WHERE email = :email AND password = :password");
            $stmt->execute(['email' => $email_user_id, 'password' => $password]);
        } else {
            $stmt = $conn->prepare("SELECT * FROM admins WHERE admin_id = :admin_id AND password = :password");
            $stmt->execute(['admin_id' => $email_user_id, 'password' => $password]);
        }

        $admin = $stmt->fetch();
        if($admin){
            // Regenerate session ID for security
            session_regenerate_id(true);
            $_SESSION['admin_id'] = $admin['admin_id'];
            header("Location: /CodeGenius/admin_dashboard");
            exit(); 
        } else {
            echo "<script type='text/javascript'>alert('Invalid email/admin_id or password!');</script>";
        }
    }
    // echo "Database connected successfully!";
} else {
    echo "Something is wrong. Try again Later!";
}
?>