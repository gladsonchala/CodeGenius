<?php 
require 'backend/conn.php';
require 'backend/session.php';

checkLoggedIn();

if(isset($_GET['course_id'])){
    $id = $_GET['course_id'];
    $sql = $conn->prepare('SELECT * FROM courses where course_id = :id');
    $sql->execute([':id' => $id]);

    $course = $sql->fetch(PDO::FETCH_ASSOC);

    $course_videoID = basename($course['course_link']);

    $image_id = $course['course_image'];
    $sql = $conn->prepare('SELECT * FROM images where image_id = :image_id');
    $sql->execute(['image_id'=>$image_id]);

    $image = $sql->fetch(PDO::FETCH_ASSOC);
    $imageUrl = $image['url'];
    $imageAlt = $image['alt'];


    $category_id = $course['course_category'];
    $sql = $conn->prepare('SELECT * FROM categories where category_id = :category_id');
    $sql->execute(['category_id'=>$category_id]);

    $category = $sql->fetch(PDO::FETCH_ASSOC);
    $course_category = $category['category_name'];
}
?>
