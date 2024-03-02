<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/dashboard.css"> 
    <link rel="stylesheet" href="css/search.css">
</head>
<body>
    <div class="container">
        <!-- Welcome Section -->
        <section class="welcome-section">
            <h1>Welcome to CodeGenius Dashboard!</h1>
            <!-- Add any additional welcome content here -->
        </section>
        
        <!-- Search Functionality -->
        <section class="search-btn">
            <form action="index.php" method="GET">		    
                <input name="query" type="search" placeholder="What are you looking for?">		    	
                <button type="submit">Search</button>
            </form>
        </section>


        <!-- Enrolled Courses Section -->
        <section class="enrolled-courses">
            <h2>Currently Enrolled Courses</h2>
            <div class="scroll-container">
                <button class="scroll-btn left"><i class="fa fa-chevron-left"></i></button>
                <div class="course-list enrolled-courses-scroll">
                    <!-- Sample Enrolled Course items -->
                    <!-- Sample Enrolled Course 1 -->
                    <div class="course">
                        <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Course 1 Image">
                        <h3>Course 1 Name</h3>
                        <p>10 Hours</p>
                        <div class="button-group1">
                            <button class="enroll-btn">Continue Course</button>
                            <button class="like-btn">Like</button>
                        </div>
                    </div>
                    <!-- Sample Enrolled Course 2 -->
                    <div class="course">
                        <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Course 2 Image">
                        <h3>Course 2 Name</h3>
                        <p>8 Hours</p>
                        <div class="button-group1">
                            <button class="enroll-btn">Enroll Now</button>
                            <button class="like-btn">Like</button>
                        </div>
                    </div>
                    <!-- Sample Enrolled Course 3 -->
                    <div class="course">
                        <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Course 3 Image">
                        <h3>Course 3 Name</h3>
                        <p>12 Hours</p>
                        <div class="button-group1">
                            <button class="enroll-btn">Enroll Now</button>
                            <button class="like-btn">Like</button>
                        </div>
                    </div>
                    <!-- Sample Enrolled Course 4 -->
                    <div class="course">
                        <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Course 4 Image">
                        <h3>Course 4 Name</h3>
                        <p>6 Hours</p>
                        <div class="button-group1">
                            <button class="enroll-btn">Enroll Now</button>
                            <button class="like-btn">Like</button>
                        </div>
                    </div>
                </div>
                <button class="scroll-btn right"><i class="fa fa-chevron-right"></i></button>
            </div>
        </section>

        <!-- Top Liked Courses -->
        <section class="top-liked-courses">
            <h2>Top Liked Courses</h2>
            <div class="scroll-container">
                <button class="scroll-btn left"><i class="fa fa-chevron-left"></i></button>
                <div class="course-list top-liked-courses-scroll">
                    <!-- Sample Top Liked Course items -->
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
                <button class="scroll-btn right"><i class="fa fa-chevron-right"></i></button>
            </div>
        </section>

        
        <!-- Top Liked Articles -->
        <section class="top-liked-articles">
            <h2>Top Liked Articles</h2>
            <div class="scroll-container">
                <button class="scroll-btn left"><i class="fa fa-chevron-left"></i></button>
                <div class="article-list top-articles-scroll">
                <!-- Sample Top Liked Article 1 -->
                <div class="article">
                    <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Article 3 Image">
                    <div class="article-info">
                        <h3>Article 3 Title</h3>
                        <div class="button-group2">
                            <button class="like-btn">Like</button>
                            <button class="read-btn">Read More</button>
                        </div>
                    </div>
                </div>
                <!-- Sample Top Liked Article 2 -->
                <div class="article">
                    <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Article 4 Image">
                    <div class="article-info">
                        <h3>Article 4 Title</h3>
                        <div class="button-group2">
                            <button class="like-btn">Like</button>
                            <button class="read-btn">Read More</button>
                        </div>
                    </div>
                </div>
                <!-- Sample Top Liked Article 3 -->
                <div class="article">
                    <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Article 5 Image">
                    <div class="article-info">
                        <h3>Article 5 Title</h3>
                        <div class="button-group2">
                            <button class="like-btn">Like</button>
                            <button class="read-btn">Read More</button>
                        </div>
                    </div>
                </div>
                <!-- Sample Top Liked Article 4 -->
                <div class="article">
                    <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Article 6 Image">
                    <div class="article-info">
                        <h3>Article 6 Title</h3>
                        <div class="button-group2">
                            <button class="like-btn">Like</button>
                            <button class="read-btn">Read More</button>
                        </div>
                    </div>
                </div>
                </div>
                <button class="scroll-btn right"><i class="fa fa-chevron-right"></i></button>
            </div>
        </section>


        <!-- Latest Courses -->
        <section class="latest-courses">
            <h2>Latest Courses</h2>
            <div class="scroll-container">
                <button class="scroll-btn left"><i class="fa fa-chevron-left"></i></button>
                <div class="course-list latest-courses-scroll">
                    <!-- Sample Latest Course items -->
                    <!-- Sample Latest Course 1 -->
                    <div class="course">
                        <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Course 5 Image">
                        <h3>Course 5 Name</h3>
                        <p>8 Hours</p>
                        <div class="button-group1">
                            <button class="enroll-btn">Enroll Now</button>
                            <button class="like-btn">Like</button>
                        </div>
                    </div>
                    <!-- Sample Latest Course 2 -->
                    <div class="course">
                        <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Course 6 Image">
                        <h3>Course 6 Name</h3>
                        <p>10 Hours</p>
                        <div class="button-group1">
                            <button class="enroll-btn">Enroll Now</button>
                            <button class="like-btn">Like</button>
                        </div>
                    </div>
                    <!-- Sample Latest Course 3 -->
                    <div class="course">
                        <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Course 7 Image">
                        <h3>Course 7 Name</h3>
                        <p>5 Hours</p>
                        <div class="button-group1">
                            <button class="enroll-btn">Enroll Now</button>
                            <button class="like-btn">Like</button>
                        </div>
                    </div>
                    <!-- Sample Latest Course 4 -->
                    <div class="course">
                        <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Course 8 Image">
                        <h3>Course 8 Name</h3>
                        <p>7 Hours</p>
                        <div class="button-group1">
                            <button class="enroll-btn">Enroll Now</button>
                            <button class="like-btn">Like</button>
                        </div>
                    </div>
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
                    <div class="article">
                        <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Article 1 Image">
                        <div class="article-info">
                            <h3>Article 1 Title</h3>
                            <div class="button-group2">
                                <button class="like-btn">Like</button>
                                <button class="read-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                    <!-- Sample Latest Article 2 -->
                    <div class="article">
                        <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Article 2 Image">
                        <div class="article-info">
                            <h3>Article 2 Title</h3>
                            <div class="button-group2">
                                <button class="like-btn">Like</button>
                                <button class="read-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                    <!-- Sample Latest Article 3 -->
                    <div class="article">
                        <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Article 3 Image">
                        <div class="article-info">
                            <h3>Article 3 Title</h3>
                            <div class="button-group2">
                                <button class="like-btn">Like</button>
                                <button class="read-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                    <!-- Sample Latest Article 4 -->
                    <div class="article">
                        <img src="/CodeGenius/uploads/sql vs mongo.jpg" alt="Article 4 Image">
                        <div class="article-info">
                            <h3>Article 4 Title</h3>
                            <div class="button-group2">
                                <button class="like-btn">Like</button>
                                <button class="read-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="scroll-btn right"><i class="fa fa-chevron-right"></i></button>
            </div>
        </section>

        <section class="categories">
            <h2>Categories</h2>
            <div class="category-list">
                <div class="category" data-name="category1">
                    <div class="category-content" style="background-image: url('/CodeGenius/uploads/sql vs mongo.jpg');">
                        <h3>Category 1 Name</h3>
                    </div>
                </div>
                <div class="category" data-name="category2">
                    <div class="category-content" style="background-image: url('/CodeGenius/uploads/sql vs mongo.jpg');">
                        <h3>Category 2 Name</h3>
                    </div>
                </div>
                <div class="category" data-name="category3">
                    <div class="category-content" style="background-image: url('/CodeGenius/uploads/sql vs mongo.jpg');">
                        <h3>Category 3 Name</h3>
                    </div>
                </div>
                <div class="category" data-name="category4">
                    <div class="category-content" style="background-image: url('/CodeGenius/uploads/sql vs mongo.jpg');">
                        <h3>Category 4 Name</h3>
                    </div>
                </div>
                <div class="category" data-name="category5">
                    <div class="category-content" style="background-image: url('/CodeGenius/uploads/sql vs mongo.jpg');">
                        <h3>Category 5 Name</h3>
                    </div>
                </div>
            </div>
        </section>


    </div>

    <script src="js/index.js"></script>
</body>
</html>
