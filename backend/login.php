<?php
require 'conn.php';

if($is_db_connected == true){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email_user_id = $_POST['email_user_id'];
        $password = $_POST['password'];

        if (filter_var($email_user_id, FILTER_VALIDATE_EMAIL)) {
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
            $stmt->execute(['email' => $email_user_id, 'password' => $password]);
        } else {
            $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = :user_id AND password = :password");
            $stmt->execute(['user_id' => $email_user_id, 'password' => $password]);
        }

        $user = $stmt->fetch();
        if($user){
            echo "<script type='text/javascript'>
                        alert('User logged in successfully!');
                        window.location.href = '/CodeGenius/dashboard.php';
                    </script>";
        } else {
            echo "<script type='text/javascript'>
                        alert('Invalid email/user_id or password!');
                        window.location.href = '/CodeGenius/login.php';
                    </script>";
        }
    }
    echo "Database connected successfully!";
} else {
    echo "Database not connected. Try again Later!";
}
?>