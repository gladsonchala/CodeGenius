<?php
session_start();

// Function to check if user is logged in
function checkLoggedInAdmin() {
    if (!isset($_SESSION['admin_id'])) {
        echo "<script type='text/javascript'>
                alert('You are not Admin dude!');
                window.location.href = '/CodeGenius/dashboard';
            </script>";
        // header("Location: /CodeGenius/dashboard");
        exit();
    }
}

// Function to redirect logged-in users away from login page
function redirectLoggedInAdmin() {
    if (isset($_SESSION['admin_id'])) {
        header("Location: /CodeGenius/admin_dashboard");
        exit();
    }
}
?>
