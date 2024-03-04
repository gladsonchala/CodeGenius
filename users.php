<?php 
require 'backend/conn.php';
require 'backend/admin_session.php';

checkLoggedInAdmin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Users List</title>
    <link rel="stylesheet" href="css/users.css"> 
</head>
<body>
<?php require 'admin_header.php'; ?>
    <div class="container">
        <!-- Welcome Section -->
        <section class="welcome-section">
            <h1>Welcome to CodeGenius Admin Dashboard!</h1>
        </section>
        
        <!-- Users Section -->
        <section class="users">
            <h2>Total CodeGenius Users</h2>
            <?php
            $totalUsersQuery = $conn->query('SELECT COUNT(*) as total_users FROM users');
            $totalUsers = $totalUsersQuery->fetch(PDO::FETCH_ASSOC)['total_users'];
            echo "<h3>Total Users: $totalUsers</h3>";
            ?>
            <h2>User List</h2>
            <div class="user-list">
                <table>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                    <?php
                    $usersQuery = $conn->query('SELECT * FROM users');
                    while ($user = $usersQuery->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>{$user['user_id']}</td>";
                        echo "<td>{$user['username']}</td>";
                        echo "<td>{$user['email']}</td>";
                        echo "<td>{$user['phone']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </section>
        
    </div>
    <script type="text/javascript" src="js/dashboard.js"></script>
    <script type="text/javascript" src="js/delete.js"></script>
</body>
</html>
