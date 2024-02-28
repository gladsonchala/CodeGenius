<?php
$servername = 'localhost:3308';
$username = 'root';
$password = '';
$dbname = 'codegenius';
$is_db_connected = false;

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $is_db_connected = true;
} catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
    $is_db_connected = false;
}
?>