<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="css/register.css"> 
</head>
<body>
    <div class="login-box">
        <h2>User Registration</h2>
        <form action="backend/register.php" method="POST" id="registration"> 
            <div class="user-box">
                <input type="text" id="username" name="username" required>
                <label>Full Name</label>
            </div>
            <div class="user-box">
                <input type="email" id="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="user-box">
                <input type="text" id="phone" name="phone" required>
                <label>Phone Number</label>
            </div>
            <div class="user-box">
                <input type="password" id="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="user-box">
                <input type="password" id="confirm_password" name="confirm_password" required>
                <label>Confirm Password</label>
            </div>
            <div id="submit_btn">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <input id="input_submit" type="submit" name="submit" value="Register">
            </div>
        </form>
    </div>
    
    <script src="js/register.js" type="text/javascript"></script>
</body>
</html>