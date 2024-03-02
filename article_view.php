<?php require 'backend/article_view.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $article['article_title'] ?></title>
    <link rel="stylesheet" href="css/article_view.css">
</head>
<body>
    <div class="container">
        <!-- Article Title -->
        <h1><?php echo $article['article_title'] ?></h1>

        <!-- Article Meta Information -->
        <div class="article-meta">
            <p>Author: <?php echo $article['article_author'] ?></p>
            <p>Date: <?php echo $article['added_date'] ?></p>
        </div>

        <!-- Article Image -->
        <div class="article-image">
            <img src="/CodeGenius/uploads<?php echo $imageUrl ?>" alt="<?php echo $imageAlt ?>">
        </div>

        <!-- Article Content -->
        <div class="article-content">
            <!-- Display article content using PHP Markdown library -->
            <?php
                require_once 'vendor/autoload.php'; // Include PHP Markdown library

                use Michelf\Markdown; 

                // Read article content from file
                $article_content = $article['article_content'];

                // Parse Markdown content
                echo Markdown::defaultTransform($article_content);
            ?>
        </div>
    </div>
</body>
</html>
