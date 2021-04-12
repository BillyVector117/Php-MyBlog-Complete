<?php
require 'admin/config.php';
require 'functions.php';
// This module get a single document from database (provided by Url-Params)

// functions are provided by functions.php module.
$connection = connection($db_config);
$article_id = article_id($_GET['id']); // Clean 'id' Url-Params

if (!$connection) {
    header('Location: error.php');
}
// Validate empty Url-Params (?id='')
if (empty($article_id)) {
    header('Location: index.php');
}
// Get one document (clicked/Url-Params) in an array format
$post = get_posts_by_id($connection, $article_id);
if (!$post) {
    // Failure case: Url-Params ID does not exists in database
    header('Location: index.php');
}

// get_posts_by_id() returns an array with the data into other array
$post = $post[0]; // Although $post contains ONE SINGLE doc, is necessary access with [0] element

require 'views/single.view.php';
