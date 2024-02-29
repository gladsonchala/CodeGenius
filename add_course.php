<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <link rel="stylesheet" href="css/add_course.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="overlay">
        <form action="backend/add_course.php" method="POST" enctype="multipart/form-data">
            <div class="con">
                <header class="head-form">
                    <h2>Add Course</h2>
                    <p>Enter course details here</p>
                </header>
                <br>
                <div class="field-set">
                    <span class="input-item">
                        <i class="fa fa-book"></i>
                    </span>
                    <input class="form-input" id="course_name" name="course_name" type="text" placeholder="Course Name" required>
                    <br>
                    <span class="input-item">
                        <i class="fa fa-info-circle"></i>
                    </span>
                    <textarea class="form-input" id="course_description" name="course_description" rows="4" placeholder="course_description" required></textarea>
                    <br>
                    <span class="input-item">
                        <i class="fa fa-link"></i>
                    </span>
                    <input class="form-input" id="course_link" name="course_link" type="url" placeholder="Course Link" required>
                    <br>
                    <span class="input-item">
                        <i class="fa fa-clock-o"></i>
                    </span>
                    <input class="form-input" id="course_duration" name="course_duration" type="text" placeholder="Duration (Hours)" min="1" required>
                    <br>
                    <span class="input-item">
                        <i class="fa fa-list"></i>
                    </span>
                    <select class="form-input" id="course_category" name="course_category" required>
                        <option value="" disabled selected>Select Course Category</option>
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
                    <input class="form-input" id="channel_name" name="channel_name" type="text" placeholder="Course Owner Channel Name" required>
                    <br>
                    <label for="image">
                        <i class="fa fa-file-image-o"></i>
                        Choose File
                        <input class="form-input" id="image" name="image" type="file" accept="image/*" required>
                    </label>
                    <br>
                    <input class="add-course-btn" type="submit" value="Add Course">
                </div>
            </div>
        </form>
    </div>
</body>
</html>