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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/dashboard.css"> 
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/users.css"> 
</head>
<body>
<?php require 'admin_header.php'; ?>
    <div class="container">
        <!-- Welcome Section -->
        <section class="welcome-section">
            <h1>Welcome to CodeGenius Admin Dashboard!</h1>
        </section>
        
        <?php require 'search.php' ?>

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
                            <button class="like-btn" onclick="deleteCourse(<?php echo $course['course_id']; ?>)">Delete</button>
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
                                <button class="like-btn" onclick="deleteArticle(<?php echo $article['article_id']; ?>)">Delete</button>
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
                        <button class="like-btn">Delete</button>
                    </div>
                </div>
            <?php endforeach; ?>

            </div>
        </section>

        <!-- Users Section -->
        <section class="users">
            <h2>Total Users</h2>
            <?php
            $totalUsersQuery = $conn->query('SELECT COUNT(*) as total_users FROM users');
            $totalUsers = $totalUsersQuery->fetch(PDO::FETCH_ASSOC)['total_users'];
            echo "<p>Total Users: $totalUsers</p>";
            ?>
            <h2>User List</h2>
            <div class="user-list">
                <table>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                    <?php
                    $usersQuery = $conn->query('SELECT * FROM users');
                    while ($user = $usersQuery->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>{$user['user_id']}</td>";
                        echo "<td>{$user['username']}</td>";
                        echo "<td>{$user['email']}</td>";
                        echo "<td>{$user['phone']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </section>

    </div>
    <script type="text/javascript" src="js/dashboard.js"></script>
    <script type="text/javascript" src="js/delete.js"></script>
</body>
</html>
