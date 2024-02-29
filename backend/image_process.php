<?php
require 'conn.php';

if($is_db_connected == true){
    function uploadImageAndGetId() {
        require 'conn.php';
        global $is_db_connected;
        if($is_db_connected){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(isset($_FILES['image'])) {
                    $filename = $_FILES['image']['name'];
                    $target_file = 'D:/wamp64/www/CodeGenius/uploads/' . $filename;
                    $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
                    $file_extension = strtolower($file_extension);
                    $valid_extension = array("png", "jpeg", "jpg");

                    if(in_array($file_extension, $valid_extension)) {
                        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                            $query = "INSERT INTO images (url, alt) VALUES (?, ?)";
                            $statement = $conn->prepare($query);
                            $statement->execute([$target_file, $filename]);
                            return $conn->lastInsertId();
                        } else {
                            echo "<script type='text/javascript'>alert('Failed to move uploaded file.');
                            window.location.href = '/CodeGenius/add_course.php';</script>";
                        }
                    } else {
                        echo "<script type='text/javascript'>alert('Invalid file extension.');
                        window.location.href = '/CodeGenius/add_course.php';</script>";
                    }
                } else {
                    echo "<script type='text/javascript'>alert('No image file received.');
                    window.location.href = '/CodeGenius/add_course.php';</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('Invalid request method.');
                window.location.href = '/CodeGenius/add_course.php';</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('Database connection error.');
            window.location.href = '/CodeGenius/add_course.php';</script>";
        }
    }
} else {
    echo "<script type='text/javascript'>
        alert('Something went wrong!');
        window.location.href = '/CodeGenius/add_course.php';
    </script>";
}
?>