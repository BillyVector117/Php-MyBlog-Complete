<?php session_start();
require 'config.php';
require '../functions.php';
checkSession(); // Ensure current Admin is active
// Database connection
$connection = connection($db_config);
if (!$connection) {
    header('Location: ../error.php');
}

// Ensure user click on Submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Extract and clean each value from input form (IF SUBMIT DATA)
    $title = cleanData($_POST['title']); // Vars are inputs 'name' attribute
    $extract = cleanData($_POST['extract']);
    $text = $_POST['text'];
    $id = cleanData($_POST['id']);
    $save_thumb = $_POST['saved_thumb']; // No visible input
    $thumb = $_FILES['thumb']; // Visible input ($_FILES is an array)

    if (empty($thumb['name'])) {
        // Is empty condition is true, it means user wants the current pic and no select another new pic
        // so, just re-write '$thumb' to the value (route pic) of the no-visible input
        $thumb = $save_thumb;
    } else {
        // Update the current image
        $uploaded_file = '../' . $blog_config['images_directory'] . $_FILES['thumb']['name'];
        move_uploaded_file($_FILES['thumb']['tmp_name'], $uploaded_file);
        $thumb = $_FILES['thumb']['name'];
    }
    $statement = $connection->prepare(
        'UPDATE articles SET title = :title, extract = :extract, content = :text, thumb = :thumb WHERE id = :id'
    );
    $statement->execute(array(
        ':title' => $title, ':extract' => $extract, ':text' => $text, ':thumb' => $thumb, ':id' => $id
    ));
    header('Location: ' . ROUTE . '/admin');
} else {
    // This 'else' statement means user is in Edit Section but no Submit yet, so just load info data into placeholders.
    // 'id' from Url-Params allows to search that document in database and put in placeholders its values.
    // Clean and extract 'id' from Url-Params
    $article_id = article_id($_GET['id']);
    // If 'id' from Url-Params does not exist, return to admin-Index page
    if (empty($article_id)) {
        header('Location: ' . ROUTE . '/admin');
    }
    $post = get_posts_by_id($connection, $article_id); // Return result in other array
    if (!$post) {
        header('Location: ' . ROUTE . '/admin');
    }
    $post = $post[0]; // Note: The result is in an array, so need to specify result is in position 0
    // print_r($post);
}
require '../views/edit.view.php';
