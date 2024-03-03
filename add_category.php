<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="css/add_category.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php require 'header.php'; ?>
    <div class="overlay">
        <form action="backend/add_category.php" method="POST">
            <div class="con">
                <header class="head-form">
                    <h2>Add Category</h2>
                    <p>Enter category details here</p>
                </header>
                <br>
                <div class="field-set">
                    <span class="input-item">
                        <i class="fa fa-list"></i>
                    </span>
                    <input class="form-input" id="category_name" name="category_name" type="text" placeholder="Category Name" required>
                    <br>
                    <input class="add-category-btn" type="submit" value="Add Category">
                </div>
            </div>
        </form>
    </div>
</body>
</html>