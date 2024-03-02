<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/courses.css"> 
    <link rel="stylesheet" href="css/search.css">
</head>
<body>
    <div class="container">
        <!-- Search Functionality -->
        <section class="search-btn">
            <form action="index.php" method="GET">		    
                <input name="query" type="search" placeholder="What are you looking for?">		    	
                <button type="submit">Search</button>
            </form>
        </section>

        <!-- Courses Section -->
        <section class="enrolled-courses">
            <h2>All Courses</h2>
            <div class="course-list enrolled-courses-scroll">
                <!-- Course items -->
                <?php
                require 'backend/conn.php';
                $sql = $conn->query('SELECT * FROM courses ORDER BY added_date DESC');
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
                        <button class="enroll-btn">Continue Course</button>
                        <button class="like-btn">Like</button>
                    </div>
                </div>
                <?php endforeach; ?>



                <!-- Sample Course 2 -->
                <div class="course">
                    <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Course 2 Image">
                    <h3>Course 2 Name</h3>
                    <p>8 Hours</p>
                    <div class="button-group1">
                        <button class="enroll-btn">Enroll Now</button>
                        <button class="like-btn">Like</button>
                    </div>
                </div>
                <!-- Sample Course 3 -->
                <div class="course">
                    <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Course 3 Image">
                    <h3>Course 3 Name</h3>
                    <p>12 Hours</p>
                    <div class="button-group1">
                        <button class="enroll-btn">Enroll Now</button>
                        <button class="like-btn">Like</button>
                    </div>
                </div>
                <!-- Sample Course 4 -->
                <div class="course">
                    <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Course 4 Image">
                    <h3>Course 4 Name</h3>
                    <p>6 Hours</p>
                    <div class="button-group1">
                        <button class="enroll-btn">Enroll Now</button>
                        <button class="like-btn">Like</button>
                    </div>
                </div>
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
        </section>
    </div>
</body>
</html>