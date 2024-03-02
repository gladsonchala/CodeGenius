<?php
session_start();

// Function to check if user is logged in
function checkLoggedIn() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: /CodeGenius/login");
        exit();
    }
}

// Function to redirect logged-in users away from login page
function redirectLoggedInUser() {
    if (isset($_SESSION['user_id'])) {
        header("Location: /CodeGenius/dashboard");
        exit();
    }
}
?>
