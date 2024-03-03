<?php
require 'conn.php';
function getCoursesByCategoryId($category_id) {
    global $conn; 
    $stmt = $conn->prepare("SELECT * FROM courses WHERE course_category = :category_id");
    $stmt->execute(['category_id' => $category_id]);
    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $courses;
}

function getArticlesByCategoryId($category_id) {
    global $conn; 
    $stmt = $conn->prepare("SELECT * FROM articles WHERE article_category = :category_id");
    $stmt->execute(['category_id' => $category_id]);
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $articles;
}

function getCategoryById($category_id) {
    global $conn; 
    $stmt = $conn->prepare("SELECT * FROM categories WHERE category_id = :category_id");
    $stmt->execute(['category_id' => $category_id]);
    $category = $stmt->fetch(PDO::FETCH_ASSOC);

    return $category;
}