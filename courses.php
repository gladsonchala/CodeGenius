<?php 
require 'backend/conn.php';
require 'backend/session.php';

checkLoggedIn();

// Check if a search query is provided
if(isset($_GET['query'])) {
    $searchQuery = htmlspecialchars($_GET['query']);
    $sql = $conn->prepare("SELECT * FROM courses WHERE course_name LIKE :query OR course_description LIKE :query OR channel_name LIKE :query ORDER BY added_date DESC");    $sql->bindValue(':query', '%' . $searchQuery . '%', PDO::PARAM_STR);
} else {
    $sql = $conn->query('SELECT * FROM courses ORDER BY added_date DESC');
}

$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/courses.css"> 
</head>
<body>
    <?php require 'header.php'; ?>
    <div class="container">
        
    <br>
    <?php require 'search.php'; ?>

        <!-- Courses Section -->
        <section class="enrolled-courses">
            <h2>All Courses</h2>
            <div class="course-list enrolled-courses-scroll">
                <!-- Course items -->
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
        </section>
    </div>
    
    <script type="text/javascript" src="js/course_enroll_btn.js"></script>
</body>
</html>
