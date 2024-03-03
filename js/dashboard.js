var scrollAmount = 300; 

// Top Liked Articles Section
var topArticlesContainer = document.querySelector('.top-articles-scroll');
document.querySelector('.top-liked-articles .scroll-btn.left').addEventListener('click', function() {
    topArticlesContainer.scrollLeft -= scrollAmount;
});
document.querySelector('.top-liked-articles .scroll-btn.right').addEventListener('click', function() {
    topArticlesContainer.scrollLeft += scrollAmount;
});

// Latest Articles Section
var latestArticlesContainer = document.querySelector('.latest-articles-scroll');
document.querySelector('.latest-articles .scroll-btn.left').addEventListener('click', function() {
    latestArticlesContainer.scrollLeft -= scrollAmount;
});
document.querySelector('.latest-articles .scroll-btn.right').addEventListener('click', function() {
    latestArticlesContainer.scrollLeft += scrollAmount;
});

// Enrolled Courses Section
var enrolledCoursesContainer = document.querySelector('.enrolled-courses-scroll');
document.querySelector('.enrolled-courses .scroll-btn.left').addEventListener('click', function() {
    enrolledCoursesContainer.scrollLeft -= scrollAmount;
});
document.querySelector('.enrolled-courses .scroll-btn.right').addEventListener('click', function() {
    enrolledCoursesContainer.scrollLeft += scrollAmount;
});

// Top Liked Courses Section
var topLikedCoursesContainer = document.querySelector('.top-liked-courses-scroll');
document.querySelector('.top-liked-courses .scroll-btn.left').addEventListener('click', function() {
    topLikedCoursesContainer.scrollLeft -= scrollAmount;
});
document.querySelector('.top-liked-courses .scroll-btn.right').addEventListener('click', function() {
    topLikedCoursesContainer.scrollLeft += scrollAmount;
});

// Latest Courses Section
var latestCoursesContainer = document.querySelector('.latest-courses-scroll');
document.querySelector('.latest-courses .scroll-btn.left').addEventListener('click', function() {
    latestCoursesContainer.scrollLeft -= scrollAmount;
});
document.querySelector('.latest-courses .scroll-btn.right').addEventListener('click', function() {
    latestCoursesContainer.scrollLeft += scrollAmount;
});
