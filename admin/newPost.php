<?php session_start();
require 'config.php';
require '../functions.php';
// Ensure active admin session
checkSession();
$connection = connection($db_config);
if (!$connection) {
    echo "algo salio mal";
    header('Location: ../error.php');
}
// Check if data form has been sent
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // clean and save data $_POST keys that refers to inputs name
    $title = cleanData($_POST['title']);
    $extract = cleanData($_POST['extract']);
    $text = $_POST['text'];
    $thumb = $_FILES['thumb']['tmp_name'];
    // Create and specify images directory (../images/one.png)
    $uploaded_file = '../' . $blog_config['images_directory'] . $_FILES['thumb']['name'];
    move_uploaded_file($thumb, $uploaded_file); // Move file from users pc to server storage
    $statement = $connection->prepare('INSERT INTO articles (id, title, extract, content, thumb) 
    VALUES (null, :title, :extract, :text, :thumb)');
    // Set the value of Params vars
    $statement->execute(array(':title' => $title, ':extract' => $extract, ':text' => $text, ':thumb' => $_FILES['thumb']['name']));
    header('Location: ' . ROUTE . '/admin');
}
require '../views/newPost.view.php';
