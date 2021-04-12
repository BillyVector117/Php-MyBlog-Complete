<!-- This module helps to re-use repetitive code -->
<?php

// Database connection (param is an array)
function connection($db_config)
{
    try {
        $connection = new PDO('mysql:host=localhost;dbname=' . $db_config['database'], $db_config['user'], $db_config['password']);
        return $connection;
    } catch (PDOException $event) {
        return false;
    }
}
// Clean any typed-string
function cleanData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Capture the current page from URL-Params 
function current_page()
{
    return isset($_GET['page']) ? (int)$_GET['page'] : 1;
}

// Get posts for a signle pagination (array format)
function get_posts($posts_per_page, $connection)
{
    // 'init' returns an unique int, depending on the page user is, it will be the point of searching in database
    // Limit set the range for Search query
    $init = (current_page() > 1) ? current_page() * $posts_per_page - $posts_per_page : 0;
    $sentense = $connection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articles LIMIT $init, $posts_per_page");
    $sentense->execute();
    return $sentense->fetchAll(); // Get all data/posts (array format)
}
// Calculate Number of pages(pagination) depending the number/length of documents (rows) in database (Return INT (total_pages))
function pages_amount($posts_per_page, $connection)
{
    // First calculate Document/rows length in database
    $total_posts = $connection->prepare('SELECT FOUND_ROWS() as total');
    $total_posts->execute();
    $total_posts = $total_posts->fetch()['total']; // Extract only the total property on the res. array (int)
    // Then calculate Number of pages
    $total_pages = ceil($total_posts / $posts_per_page);
    return $total_pages; // return INT
}

// Clean id from Url-Params
function article_id($id)
{
    // Ensure this functions returns only NUMBER type ($id provided in Url-Params)
    return (int)cleanData($id);
}

// Get ONE SINGLE document/post with id (from Url-Params) Array format
function get_posts_by_id($connection, $id)
{
    $result = $connection->query("SELECT * FROM articles WHERE id = $id LIMIT 1");
    $result = $result->fetchAll(); // Get all results (1)
    // print_r($result[0]['date']); // 0000-00-00 00:00:00

    return ($result) ? $result : false; // Extract article if exist in database

}
// Transform TimeStamp/String to Date type
function newDate($date)
{
    $timestamp = strtotime($date);
    $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    $day = date('d', $timestamp);
    $month = date('m', $timestamp) - 1;
    $year = date('y', $timestamp);
    $date = "$months[$month] $day, $year";
    return $date; // November 30, -0001
}

function checkSession()
{
    if (!isset($_SESSION['admin'])) {
        // ROUTE provided from config.php
        header('Location: ' . ROUTE);
    }
}




?>