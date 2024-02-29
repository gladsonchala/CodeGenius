<?php
require 'conn.php';

if($is_db_connected == true){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $stmt = $conn->prepare("INSERT INTO users (username, password, email, phone) VALUES (:username, :password, :email, :phone)");
        $stmt->execute(['username' => $username, 'password' => $password, 'email' => $email, 'phone' => $phone]);
        echo "<script type='text/javascript'>
                        alert('User registered successfully!');
                        window.location.href = '/CodeGenius/login.php';
                    </script>";
    }
} else {
    echo "<script type='text/javascript'>
                    alert('Database not connected. Try again Later!');
                    window.location.href = '/CodeGenius/register.php';
                </script>";
}
?>