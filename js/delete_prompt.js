function deleteCourse(courseId) {
    if (confirm("Are you sure you want to delete this course?")) {
        window.location.href = "backend/delete.php?type=course&course_id=" + courseId;
    }
}

function deleteArticle(articleId) {
    if (confirm("Are you sure you want to delete this article?")) {
        window.location.href = "backend/delete.php?type=article&article_id=" + articleId;
    }
}