<?php
require 'image_process.php';
require 'backend/admin_session.php';

if($is_db_connected){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $course_name = $_POST['course_name'];
        $course_description = $_POST['course_description'];
        $course_link = $_POST['course_link'];
        $course_duration = $_POST['course_duration'];
        $course_category = $_POST['course_category'];
        $channel_name = $_POST['channel_name'];
        $course_image = uploadImageAndGetId(); 

        if($course_image !== false) {
            // Prepare and execute the SQL statement to insert course details into the database
            $stmt = $conn->prepare("INSERT INTO courses (course_name, course_description, course_link, course_duration, course_category, channel_name, course_image) VALUES (:course_name, :course_description, :course_link, :course_duration, :course_category, :channel_name, :course_image)");
            $stmt->execute(['course_name' => $course_name, 'course_description' => $course_description, 'course_link' => $course_link, 'course_duration' => $course_duration, 'course_category' => $course_category, 'channel_name' => $channel_name, 'course_image' => $course_image]);

            if($stmt->rowCount() > 0){
                echo "<script type='text/javascript'>
                            alert('Course added successfully!');
                            window.location.href = '/CodeGenius/add_course.php';
                        </script>";
            } else {
                echo "<script type='text/javascript'>
                            alert('Course not added. Try again Later!');
                            window.location.href = '/CodeGenius/add_course.php';
                        </script>";
            }
        } else {
            echo "<script type='text/javascript'>
                            alert('Failed to upload image. Try again Later!');
                            window.location.href = '/CodeGenius/add_course.php';
                        </script>";
        }
    } else {
        echo "<script type='text/javascript'>
                        alert('Invalid request!');
                        window.location.href = '/CodeGenius/add_course.php';
                    </script>";
    }
}
?>