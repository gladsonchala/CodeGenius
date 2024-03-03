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
        
        <!-- Search Functionality -->
        <section class="search-btn">
            <form action="index.php" method="GET">		    
                <input name="query" type="search" placeholder="What are you looking for?">		    	
                <button type="submit">Search</button>
            </form>
        </section>


        <!-- Enrolled Courses Section -->
        <section class="enrolled-courses">
            <h2>Currently Enrolled Courses</h2>
            <div class="scroll-container">
                <button class="scroll-btn left"><i class="fa fa-chevron-left"></i></button>
                <div class="course-list enrolled-courses-scroll">
                    <!-- Sample Enrolled Course items -->
                    <!-- Sample Enrolled Course 1 -->
                    <div class="course">
                        <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Course 1 Image">
                        <h3>Course 1 Name</h3>
                        <p>10 Hours</p>
                        <div class="button-group1">
                            <button class="enroll-btn">Continue Course</button>
                            <button class="like-btn">Like</button>
                        </div>
                    </div>
                    <!-- Sample Enrolled Course 2 -->
                    <div class="course">
                        <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Course 2 Image">
                        <h3>Course 2 Name</h3>
                        <p>8 Hours</p>
                        <div class="button-group1">
                            <button class="enroll-btn">Enroll Now</button>
                            <button class="like-btn">Like</button>
                        </div>
                    </div>
                    <!-- Sample Enrolled Course 3 -->
                    <div class="course">
                        <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Course 3 Image">
                        <h3>Course 3 Name</h3>
                        <p>12 Hours</p>
                        <div class="button-group1">
                            <button class="enroll-btn">Enroll Now</button>
                            <button class="like-btn">Like</button>
                        </div>
                    </div>
                    <!-- Sample Enrolled Course 4 -->
                    <div class="course">
                        <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Course 4 Image">
                        <h3>Course 4 Name</h3>
                        <p>6 Hours</p>
                        <div class="button-group1">
                            <button class="enroll-btn">Enroll Now</button>
                            <button class="like-btn">Like</button>
                        </div>
                    </div>
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
                            <button class="enroll-btn" onclick="window.location.href='./course_view?course_id=<?php echo $course['course_id']; ?>'">Continue Course</button>
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

        
        <!-- Top Liked Courses -->
        <section class="top-liked-courses">
            <h2>Top Liked Courses</h2>
            <div class="scroll-container">
                <button class="scroll-btn left"><i class="fa fa-chevron-left"></i></button>
                <div class="course-list top-liked-courses-scroll">
                    <!-- Sample Top Liked Course items -->
                    <!-- Sample Top Liked Course 1 -->
                    <div class="course">
                        <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Course 3 Image">
                        <h3>Course 3 Name</h3>
                        <p>12 Hours</p>
                        <div class="button-group1">
                            <button class="enroll-btn">Enroll Now</button>
                            <button class="like-btn">Like</button>
                        </div>
                    </div>
                    <!-- Sample Top Liked Course 2 -->
                    <div class="course">
                        <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Course 4 Image">
                        <h3>Course 4 Name</h3>
                        <p>6 Hours</p>
                        <div class="button-group1">
                            <button class="enroll-btn">Enroll Now</button>
                            <button class="like-btn">Like</button>
                        </div>
                    </div>
                    <!-- Sample Top Liked Course 3 -->
                    <div class="course">
                        <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Course 6 Image">
                        <h3>Course 6 Name</h3>
                        <p>9 Hours</p>
                        <div class="button-group1">
                            <button class="enroll-btn">Enroll Now</button>
                            <button class="like-btn">Like</button>
                        </div>
                    </div>
                    <!-- Sample Top Liked Course 4 -->
                    <div class="course">
                        <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Course 7 Image">
                        <h3>Course 7 Name</h3>
                        <p>7 Hours</p>
                        <div class="button-group1">
                            <button class="enroll-btn">Enroll Now</button>
                            <button class="like-btn">Like</button>
                        </div>
                    </div>
                </div>
                <button class="scroll-btn right"><i class="fa fa-chevron-right"></i></button>
            </div>
        </section>

        
        <!-- Top Liked Articles -->
        <section class="top-liked-articles">
            <h2>Top Liked Articles</h2>
            <div class="scroll-container">
                <button class="scroll-btn left"><i class="fa fa-chevron-left"></i></button>
                <div class="article-list top-articles-scroll">
                <!-- Sample Top Liked Article 1 -->
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
                <!-- Sample Top Liked Article 2 -->
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
                <!-- Sample Top Liked Article 3 -->
                <div class="article">
                    <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Article 5 Image">
                    <div class="article-info">
                        <h3>Article 5 Title</h3>
                        <div class="button-group2">
                            <button class="like-btn">Like</button>
                            <button class="read-btn">Read More</button>
                        </div>
                    </div>
                </div>
                <!-- Sample Top Liked Article 4 -->
                <div class="article">
                    <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Article 6 Image">
                    <div class="article-info">
                        <h3>Article 6 Title</h3>
                        <div class="button-group2">
                            <button class="like-btn">Like</button>
                            <button class="read-btn">Read More</button>
                        </div>
                    </div>
                </div>
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

    </div>

    <script type="text/javascript" src="js/dashboard.js"></script>
</body>
</html>
