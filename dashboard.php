<?php 
require 'backend/conn.php';
require 'backend/session.php';

checkLoggedIn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/dashboard.css"> 
    <link rel="stylesheet" href="css/search.css">
</head>
<body>
<?php require 'header.php'; ?>
    <div class="container">
        <!-- Welcome Section -->
        <section class="welcome-section">
            <h1>Welcome to CodeGenius Dashboard!</h1>
        </section>

        <?php require 'search.php'; ?>

        <!-- Enrolled Courses Section -->
        <section class="enrolled-courses">
            <h2>Currently Enrolled Courses</h2>
            <div class="scroll-container">
                <button class="scroll-btn left"><i class="fa fa-chevron-left"></i></button>
                <div class="course-list enrolled-courses-scroll">
                    <?php
                    $sql_enrolled_courses = $conn->prepare("SELECT courses.course_id, courses.course_name, courses.course_duration, courses.course_image FROM enrolled_courses INNER JOIN courses ON enrolled_courses.course_id = courses.course_id WHERE enrolled_courses.user_id = :user_id");
                    $sql_enrolled_courses->execute(["user_id" => getCurrentUserId()]);
                    $enrolled_courses = $sql_enrolled_courses->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php foreach($enrolled_courses as $course): ?>
                    <?php
                    $imageQuery = $conn->query("SELECT * FROM images where image_id = '{$course["course_image"]}';");
                    $imageQuery->execute();
                    $image = $imageQuery->fetch(PDO::FETCH_ASSOC);
                    if ($image) {
                        $imageUrl = '/' . basename($image['url']);
                        $imageAlt = $image['alt'];
                    } else {
                        $imageUrl = '';
                        $imageAlt = '';
                    }
                    ?>
                        <div class="course">
                            <img src="/CodeGenius/uploads<?php echo $imageUrl; ?>" alt="<?php echo $imageAlt; ?>">
                            <h3><?php echo $course['course_name']; ?></h3>
                            <p><?php echo $course['course_duration']; ?></p>
                            <div class="button-group1">
                                <button class="enroll-btn" onclick="enrollCourse(<?php echo $course['course_id']; ?>)">Enroll</button>
                                <button class="like-btn">Like</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="scroll-btn right"><i class="fa fa-chevron-right"></i></button>
            </div>
        </section>


        

        <!-- Latest Courses -->
        <section class="latest-courses">
            <h2>Latest Courses</h2>
            <div class="scroll-container">
                <button class="scroll-btn left"><i class="fa fa-chevron-left"></i></button>
                <div class="course-list latest-courses-scroll">
                    <!-- Sample Latest Course items -->
                    <!-- Course items -->
                    <?php
                    $sql = $conn->query('SELECT * FROM courses ORDER BY added_date DESC limit 10');
                    $sql->execute();
                    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php foreach($result as $course): ?>
                    <?php
                    $isql = $conn->query("SELECT * FROM images where image_id = '{$course["course_image"]}';");
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
                    <div class="course">
                        <img src="/CodeGenius/uploads<?php echo $imageUrl; ?>" alt="<?php echo $imageAlt; ?>">
                        <h3><?php echo $course['course_name']; ?></h3>
                        <p><?php echo $course['course_duration']; ?></p>
                        <div class="button-group1">
                            <button class="enroll-btn" onclick="enrollCourse(<?php echo $course['course_id']; ?>)">Enroll</button>
                            <button class="like-btn">Like</button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <button class="scroll-btn right"><i class="fa fa-chevron-right"></i></button>
            </div>
        </section>

        <!-- Latest Articles -->
        <section class="latest-articles">
            <h2>Latest Articles</h2>
            <div class="scroll-container">
                <button class="scroll-btn left"><i class="fa fa-chevron-left"></i></button>
                <div class="article-list latest-articles-scroll">
                    <!-- Sample Latest Article 1 -->
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
                                <button class="read-btn" onclick="window.location.href='./article_view?article_id=<?php echo $article['article_id']; ?>'">Read</button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
                <button class="scroll-btn right"><i class="fa fa-chevron-right"></i></button>
            </div>
        </section>

        <section class="categories">
            <h2>Categories</h2>
            <div class="category-list">

            <?php
            $sql = $conn->query('SELECT * FROM categories');
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <?php foreach ($result as $category): ?>
                <div class="category" onclick="window.location.href='./category?category_id=<?php echo $category['category_id']; ?>'">
                    <div class="category-content" style="background-image: url('/CodeGenius/uploads/sql vs mongo.jpg');">
                        <h3><?php echo $category['category_name']; ?></h3>
                    </div>
                </div>
            <?php endforeach; ?>

            </div>
        </section>

        <?php require './footer.php'; ?>
        
    </div>
    <script type="text/javascript" src="js/dashboard.js"></script>
    <script type="text/javascript" src="js/course_enroll_btn.js"></script>
</body>
</html>
