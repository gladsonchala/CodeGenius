<?php require 'backend/conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/articles.css"> 
    <link rel="stylesheet" href="css/search.css">
</head>
<body>
    <div class="container">
        <!-- Welcome Section -->
        <section class="welcome-section">
            <h1>Welcome to the Articles List!</h1>
            <!-- Add any additional welcome content here -->
        </section>
        
        <!-- Search Functionality -->
        <section class="search-btn">
            <form action="index.php" method="GET">		    
                <input name="query" type="search" placeholder="What are you looking for?">		    	
                <button type="submit">Search</button>
            </form>
        </section>


        <!-- Articles List Section -->
        <section class="articles-list">
            <br>
            <div class="article-list">
                <!-- Article Items -->
                <?php
                $sql = $conn->query('SELECT * FROM articles ORDER BY added_date DESC limit 10');
                $sql->execute();
                $result = $sql->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <?php foreach($result as $article): ?>
                <?php
                $isql = $conn->query("SELECT * FROM images where image_id = '{$article["article_image"]}';");
                $isql->execute();
                $image = $isql->fetch(PDO::FETCH_ASSOC);
                if ($image) {
                    $imageUrl = '/' . basename($image['url']);
                    $imageAlt = $image['alt'];
                } else {
                    $imageUrl = '';
                    $imageAlt = '';
                }
                ?>
                <div class="article">
                    <img src="/CodeGenius/uploads<?php echo $imageUrl; ?>" alt="<?php echo $imageAlt; ?>">
                    <div class="article-info">
                        <h3><?php echo $article['article_title'] ?></h3>
                        <div class="button-group2">
                            <button class="like-btn">Like</button>
                            <button class="read-btn">Read More</button>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>

                
                <!-- Sample Article 2 -->
                <div class="article">
                    <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Article 2 Image">
                    <div class="article-info">
                        <h3>Article 2 Title</h3>
                        <div class="button-group2">
                            <button class="like-btn">Like</button>
                            <button class="read-btn">Read More</button>
                        </div>
                    </div>
                </div>
                <!-- Sample Article 3 -->
                <div class="article">
                    <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Article 3 Image">
                    <div class="article-info">
                        <h3>Article 3 Title</h3>
                        <div class="button-group2">
                            <button class="like-btn">Like</button>
                            <button class="read-btn">Read More</button>
                        </div>
                    </div>
                </div>
                <!-- Sample Article 4 -->
                <div class="article">
                    <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Article 4 Image">
                    <div class="article-info">
                        <h3>Article 4 Title</h3>
                        <div class="button-group2">
                            <button class="like-btn">Like</button>
                            <button class="read-btn">Read More</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
