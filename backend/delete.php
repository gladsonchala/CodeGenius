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
?>
