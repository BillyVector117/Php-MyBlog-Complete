<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel='stylesheet' type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Redressed&family=DotGothic16&family=Rubik:ital@1&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/ff6a64be3e.js" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link rel="stylesheet" href="<?php ROUTE; ?>css/style.css">
    <!-- ROUTE = https://localhost/phpCourse/blog" -->
    <title>Blog - Billy Rodriguez M.</title>
</head>

<body style="background: antiquewhite;">
    <header>
        <nav class="container navbar navbar-expand-lg navbar-light bg-gradient-light text-dark ml-auto mr-auto">
            <div class="d-flex justify-content-end">
                <a class="navbar-brand mr-auto continue" href="<?php echo ROUTE; ?>">BLOG</a>
            </div>
            <div class="ml-5">
                <form class="form-inline d-flex ml-5" name="search" action="<?php echo ROUTE; ?>/search.php" method="GET">
                    <input class="form-control mr-sm-2 border border-danger" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0 fa fa-search" type="submit"></button>
                </form>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li>
                        <h3><a class="nav-link" href="http://twitter.com/Billyvector117"><i class="fa fa-twitter"></i></a></h3>
                    </li>
                    <li>
                        <h3><a class="nav-link" href="https://github.com/BillyVector117"><i class="fa fa-github"></i></a></h3>
                    </li>
                    <li>
                        <h3><a class="nav-link" href="#"><i class="fa fa-envelope"></i></a></h3>
                    </li>
                    <li>
                        <h3><a class="nav-link" href="../blog/login.php/"><i class="fa fa-user-shield"> Admin </i></a></h3>
                    </li>
                </ul>
            </div>
        </nav>
    </header>