<?php
require 'backend/category.php';

$category = getCategoryById($_GET['category_id']);
$articles = getArticlesByCategoryId($_GET['category_id']);
$courses = getCoursesByCategoryId($_GET['category_id']);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $category['category_name']; ?></title>
    <link rel="stylesheet" href="css/category.css">
</head>
<?php require 'header.php'; ?>
<body>
    <div class="category-content">
        <h1><?php echo $category['category_name']; ?></h1>

        <h2>Articles</h2>
        <ul>
            <?php foreach ($articles as $article): ?>
                    <a href="article_view?article_id=<?php echo $article['article_id']; ?>">
                        <li>
                            <?php echo $article['article_title']; ?>
                        </li>
                    </a>
            <?php endforeach; ?>
        </ul>

        <h2>Courses</h2>
        <ul>
            <?php foreach ($courses as $course): ?>
                <a href="course_view?course_id=<?php echo $course['course_id']; ?>">
                    <li>
                        <?php echo $course['course_name']; ?>
                    </li>
                </a>
                
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>