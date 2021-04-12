<!-- HEADER START -->
<?php
require 'header.php';
?>
<!-- HEADER END -->

<!-- ITERATION DATA START -->
<!-- Documents extracted from database returned as $results in 'search.php' -->
<?php foreach ($results as $post) : ?>
    <!-- $title is provided from search.php -->
    <h2 class="m-3"><?php echo $title ?> </h2>

    <div class="container text-center mt-5">
        <div class="jumbotron jumbotron-fluid">
            <div class="post">
                <article class="">
                    <h2 class="display-4 title"><a href="single.php?id=<?php echo $post['id'] ?>"><?php echo $post['title'] ?></a></h2>
                    <p class="lead date"><?php echo newDate($post['date']) ?></p>
                    <div class="d-flex align-content-center flex-wrap justify-content-center">
                        <a href="single.php?id=<?php echo $post['id'] ?>">
                            <img class="img-fluid d-block thumb" src="<?php echo $MYROUTE; ?>/images/<?php echo $post['thumb'] ?>" alt="image1">
                        </a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <p class="extract "><?php echo $post['extract']; ?></p>
                    </div>
                    <a href="single.php?id=<?php echo $post['id'] ?>" class="continue">Continue reading...</a>
                </article>
            </div>
        </div>
        <hr>
    <?php endforeach; ?>
    <!-- ITERATION DATA END -->

    <!-- PAGINATION START -->
    <?php require 'pagination.php' ?>
    <!-- PAGINATION END -->

    </div>
    </body>

    <!-- FOOTER START -->
    <?php require 'footer.php' ?>
    <!-- FOOTER END -->

    </html>