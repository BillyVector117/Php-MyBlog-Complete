<?php session_start(); // Note: All admin routes need to have an active Admin session
require 'config.php';
require '../functions.php';
// Admin Index File

// Database connection
$connection = connection($db_config);
// Check active admin session function
checkSession();
// Ensure an active connection to database
if (!$connection) {
    header('Location: error.php');
}
// Get posts from database (array format)
$posts = get_posts($blog_config['posts_per_page'], $connection);
// print_r($posts); // returns data in array-format
if (!$posts) {
    echo 'no posts yet';
}

require '../views/admin.index.view.php';
