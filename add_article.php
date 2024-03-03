<?php 
require 'backend/conn.php';
require 'backend/admin_session.php';

checkLoggedInAdmin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Article</title>
    <link rel="stylesheet" href="css/add_article.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php require 'header.php'; ?>
    <div class="overlay">
        <form action="backend/add_article.php" method="POST" enctype="multipart/form-data">
            <div class="con">
                <header class="head-form">
                    <h2>Add Article</h2>
                    <p>Enter article details here</p>
                </header>
                <br>
                <div class="field-set">
                    <span class="input-item">
                        <i class="fa fa-book"></i>
                    </span>
                    <input class="form-input" id="article_title" name="article_title" type="text" placeholder="Article Title" required>
                    <br>
                    <span class="input-item">
                        <i class="fa fa-list"></i>
                    </span>
                    <select class="form-input" id="article_category" name="article_category" required>
                        <option value="" disabled selected>Select Article Category</option>
                        <?php 
                        require 'backend/conn.php';
                        $sql = "SELECT * FROM categories";
                        $result = $conn->query($sql);
                        $categories = $result->fetchAll();
                        foreach($categories as $category): ?>
                            <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <span class="input-item">
                        <i class="fa fa-user"></i>
                    </span>
                    <input class="form-input" id="article_author" name="article_author" type="text" placeholder="Article Author" required>
                    <br>
                    <label for="image">
                        <i class="fa fa-file-image-o"></i>
                        Choose File
                        <input class="form-input" id="image" name="image" type="file" accept="image/*" required>
                    </label>
                    <br>
                    <span class="input-item">
                        <i class="fa fa-info-circle"></i>
                    </span>
                    <textarea class="form-input" id="article_content" name="article_content" rows="4" placeholder="Article Content" required></textarea>
                    <br>
                    <input class="add-article-btn" type="submit" value="Add Article">
                </div>
            </div>
        </form>
    </div>
</body>
</html>