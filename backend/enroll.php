<?php
require 'conn.php';
require 'session.php';

if (!isset($_GET['course_id'])) {
    header("Location: /CodeGenius/dashboard.php");
    exit;
}

$user_id = getCurrentUserId();
$course_id = $_GET['course_id'];

$sql_check_enrollment = $conn->prepare("SELECT * FROM enrolled_courses WHERE user_id = :user_id AND course_id = :course_id");
$sql_check_enrollment->execute(["user_id"=> $user_id,"course_id"=> $course_id]);

if ($sql_check_enrollment->rowCount() > 0) {
    echo "<script>alert('You\'re already enrolled.')</script>";
    header("Location: /CodeGenius/course_view.php?course_id=$course_id");
    exit;
}

// Insert enrollment into the database
$sql_enroll = $conn->prepare("INSERT INTO enrolled_courses (user_id, course_id) VALUES (:user_id, :course_id)");
$sql_enroll->execute(["user_id"=> $user_id,"course_id"=> $course_id]);
echo "<script>alert('Enrolled Successfully')</script>";
header("Location: /CodeGenius/course_view.php?course_id=$course_id");
exit;
?>
