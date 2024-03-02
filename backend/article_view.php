<?php 
require 'backend/conn.php';
require 'backend/session.php';

checkLoggedIn();


if(isset($_GET['article_id'])){
    $id = $_GET['article_id'];
    $sql = $conn->prepare("SELECT * from articles where article_id = :id");
    $sql->execute([':id' => $id]);

    $article = $sql->fetch(PDO::FETCH_ASSOC);
    $image_id = $article['article_image'];

    $sql = $conn->prepare("SELECT * from images where image_id = :image_id");
    $sql->execute([':image_id' => $image_id]);
    $image = $sql->fetch(PDO::FETCH_ASSOC);
    if ($image) {
        $imageUrl = '/' . basename($image['url']);
        $imageAlt = $image['alt'];
    } else {
        $imageUrl = '';
        $imageAlt = '';
    }
}