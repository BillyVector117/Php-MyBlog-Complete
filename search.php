<?php
require 'functions.php';
require 'admin/config.php';

// Database connection
$connection = connection($db_config);
if (!$connection) {
    header('Location: error.php');
}
// Validate user submit data in search button only if it is not empty
if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['search'])) {
    // Save search and clean characters to prevent Scripts
    $search = cleanData($_GET['search']);
    // Query to find and get articles where its title or text columns contains the words typed by user in form
    $statement = $connection->prepare(
        'SELECT * FROM articles WHERE title LIKE :search or content LIKE :search'
    );
    $statement->execute(array(':search' => "%$search%")); // Make reference to :search params
    $results = $statement->fetchAll(); // Get results

    // Validate in case exists/or not documents
    if (empty($results)) {
        $title = "No documents were found for: " . $search;
    } else {
        $title = "We found this for: " . $search;
    }
} else {
    header('Location: ' . ROUTE . '/index.php');
}
require 'views/search.view.php';
