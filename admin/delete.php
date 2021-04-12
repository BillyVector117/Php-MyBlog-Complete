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
// Extract and clean id from Url-Params
$id = cleanData($_GET['id']);
if (!$id) {
    header('Location: ' . ROUTE . '/admin');
}
$statement = $connection->prepare('DELETE FROM articles WHERE id = :id');
$statement->execute(array('id' => $id));
header('Location: ' . ROUTE . '/admin');
