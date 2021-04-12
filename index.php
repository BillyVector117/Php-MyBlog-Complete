<?php
require 'functions.php';
require 'admin/config.php'; // Like .env file

// Database connection, thisd function returns the shorcut connection to make queries
$connection = connection($db_config);
if (!$connection) {
    header('Location: error.php');
}

$posts = get_posts($blog_config['posts_per_page'], $connection); // This line returns posts
// print_r($post); // returns data in an array
if (!$posts) {
    header('Location: error.php');
}
require 'views/index.view.php';
