<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/login.css"> 
</head>
<body>
    <?php require 'header.php'; ?>
    <div class="login-box">
        <h2>Admin Login</h2>
        <form action="backend/admin_login.php" method="POST" id="login"> 
            <div class="user-box">
                <input type="text" id="email_user_id" name="email_user_id" required>
                <label>Email/ID</label>
            </div>
            <div class="user-box">
                <input type="password" id="password" name="password" required>
                <label>Password</label>
            </div>
            <div id="submit_btn">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <input id="input_submit" type="submit" name="submit" value="Login">
            </div>
        </form>
    </div>
    
    <script src="js/login.js" type="text/javascript"></script>
</body>
</html>