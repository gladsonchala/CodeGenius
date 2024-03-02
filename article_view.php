<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Title</title>
    <link rel="stylesheet" href="css/article_view.css">
</head>
<body>
    <div class="container">
        <!-- Article Title -->
        <h1>Article Title</h1>

        <!-- Article Meta Information -->
        <div class="article-meta">
            <p>Author: John Doe</p>
            <p>Date: January 1, 2024</p>
        </div>

        <!-- Article Image -->
        <div class="article-image">
            <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Article Image">
        </div>

        <!-- Article Content -->
        <div class="article-content">
            <!-- Display article content using PHP Markdown library -->
            <?php
                require_once 'vendor/autoload.php'; // Include PHP Markdown library

                use Michelf\Markdown; // Import Markdown class

                // Read article content from file
                $article_content = "**I'm Title Example**";

                // Parse Markdown content
                echo Markdown::defaultTransform($article_content);
            ?>
        </div>
    </div>
</body>
</html>
