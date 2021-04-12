<?php session_start();
session_destroy();
$_SESSION = array(); // Clean/reset $_SESSION var
header('Location: ../');
die();
