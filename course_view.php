<?php require 'backend/course_view.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $course['course_name'] ?></title>
    <link rel="stylesheet" href="css/course_view.css">
</head>
<body>
    <div class="container">
        <!-- Title -->
        <h1><?php echo $course['course_name'] ?></h1>

        <!-- Course Video -->
        <div class="course-video">
            <!-- Embedded YouTube video -->
            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $course_videoID ?>" frameborder="0" allowfullscreen></iframe>
        </div>

        <!-- Course Details -->
        <div class="course-details">
            <p>Course Owner: <a href="#"><?php echo $course['channel_name'] ?></a></p>
            <p>Published Time: <?php echo $course['added_date'] ?></p>
            <p>Category: <?php echo $course_category ?></p>
            <p>Duration: <?php echo $course['course_duration'] ?></p>
        </div>

        <!-- Course Description -->
        <div class="course-description">
            <h2>Description</h2>
            <p><?php echo $course['course_description'] ?></p>
            <!-- Add more description content as needed -->
        </div>
    </div>
</body>
</html>
