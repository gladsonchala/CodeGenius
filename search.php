<link rel="stylesheet" href="css/search.css">
<!-- Search Functionality -->
<section class="search-btn">
    <form action="courses.php" method="GET">		    
        <input name="query" type="search" placeholder="What are you looking for?" value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">		    	
        <button type="submit">Search</button>
    </form>
</section>
