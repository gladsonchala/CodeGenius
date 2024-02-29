<?php
require 'conn.php';

if($is_db_connected){
    $category = $_POST['category_name'];
    $stmt = $conn->prepare("INSERT INTO categories (category_name) VALUES (:category_name)");
    $stmt->execute(['category_name' => $category]);
    if ($stmt->rowCount() > 0) {
        echo "<script type='text/javascript'>
                        alert(\"Category {$category} added successfully!\");
                        window.location.href = 'add_category.html';
                    </script>";
    } else {
        echo "<script type='text/javascript'>
                        alert(\"Error adding category! Try again later!!\");
                        window.location.href = 'add_category.html';
                    </script>";
    }
}
?>