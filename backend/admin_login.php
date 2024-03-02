<?php
require 'conn.php';

if($is_db_connected == true){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email_user_id = $_POST['email_user_id'];
        $password = $_POST['password'];

        if (filter_var($email_user_id, FILTER_VALIDATE_EMAIL)) {
            $stmt = $conn->prepare("SELECT * FROM admins WHERE email = :email AND password = :password");
            $stmt->execute(['email' => $email_user_id, 'password' => $password]);
        } else {
            $stmt = $conn->prepare("SELECT * FROM admins WHERE admin_id = :admin_id AND password = :password");
            $stmt->execute(['admin_id' => $email_user_id, 'password' => $password]);
        }

        $user = $stmt->fetch();
        if($user){
            echo "<script type='text/javascript'>
                        alert('Admin logged in successfully!');
                        window.location.href = '/CodeGenius/admin_dashboard.php';
                    </script>";
        } else {
            echo "<script type='text/javascript'>
                        alert('Invalid email/admin_id or password!');
                        window.location.href = '/CodeGenius/admin_login.php';
                    </script>";
        }
    }
} else {
    echo "Database not connected. Try again Later!";
}
?>