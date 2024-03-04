<?php
require 'conn.php';

function deleteCourseById($course_id) {
    global $conn;
    $sql = $conn->prepare("DELETE FROM courses WHERE course_id = :course_id");
    $sql->bindParam(':course_id', $course_id, PDO::PARAM_INT);
    $sql->execute();
    // Optionally, you can also delete related data from other tables if needed
}

function deleteArticleById($article_id) {
    global $conn;
    $sql = $conn->prepare("DELETE FROM articles WHERE article_id = :article_id");
    $sql->bindParam(':article_id', $article_id, PDO::PARAM_INT);
    $sql->execute();
    // Optionally, you can also delete related data from other tables if needed
}

function deleteCategoryById($category_id) {
    global $conn;
    $sql = $conn->prepare("DELETE FROM categories WHERE category_id = :category_id");
    $sql->bindParam(':category_id', $category_id, PDO::PARAM_INT);
    $sql->execute();
    // Optionally, you can also delete related data from other tables if needed
}

// Check the type of deletion requested and call the appropriate function
if(isset($_GET['type']) && isset($_GET['id'])) {
    $type = $_GET['type'];
    $id = $_GET['id'];
    
    if($type == 'course') {
        deleteCourseById($id);
        header('Location: /CodeGenius/admin_dashboard');
    } elseif($type == 'article') {
        deleteArticleById($id);
        header('Location: /CodeGenius/admin_dashboard');
    } elseif($type == 'category') {
        deleteCategoryById($id);
        header('Location: /CodeGenius/admin_dashboard');
    }
}
?>
