<?php
require 'image_process.php';
require 'backend/admin_session.php';

if($is_db_connected){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $article_title = $_POST['article_title'];
        $article_category = $_POST['article_category'];
        $article_author = $_POST['article_author'];
        $article_content = $_POST['article_content'];
        $article_image = uploadImageAndGetId(); 

        if($article_image !== false) {
            // Prepare and execute the SQL statement to insert article details into the database
            $stmt = $conn->prepare("INSERT INTO articles (article_title, article_category, article_author, article_content, article_image) VALUES (:article_title, :article_category, :article_author, :article_content, :article_image)");
            $stmt->execute(['article_title' => $article_title, 'article_category' => $article_category, 'article_author' => $article_author, 'article_content' => $article_content, 'article_image' => $article_image]);

            if($stmt->rowCount() > 0){
                echo "<script type='text/javascript'>
                            alert('Article added successfully!');
                            window.location.href = '/CodeGenius/add_article.php';
                        </script>";
            } else {
                echo "<script type='text/javascript'>
                            alert('Article not added. Try again Later!');
                            window.location.href = '/CodeGenius/add_article.php';
                        </script>";
            }
        } else {
            echo "<script type='text/javascript'>
                            alert('Failed to upload image. Try again Later!');
                            window.location.href = '/CodeGenius/add_article.php';
                        </script>";
        }
    } else {
        echo "<script type='text/javascript'>
                        alert('Invalid request!');
                        window.location.href = '/CodeGenius/add_article.php';
                    </script>";
    }
}
?>