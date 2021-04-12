<?php session_start(); // Allows to use session functions
require 'admin/config.php';
require 'functions.php';

// Validate typed input-data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Clean data
    $user = cleanData($_POST['user']);
    $password = cleanData($_POST['password']);

    // Create a new current Session with Admin 'name'
    if ($user == $blog_admin['user'] && $password == $blog_admin['password']) {
        $_SESSION['admin'] = $blog_admin['user'];
        header('Location: ' . ROUTE . '/admin'); // NOTE: All Admin routes need to validate 'session_start()' because are protected
    }
}
require 'views/login.view.php';
