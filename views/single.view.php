<!-- HEADER START -->
<?php
require 'header.php';
?>
<!-- HEADER END -->
<div class="container text-center mt-5">
    <div class="jumbotron jumbotron-fluid">
        <div class="post">
            <article>
                <h2 class="display-4 title"><?php echo $post['title']; ?></h2>
                <p class="lead date"><?php echo newDate($post['date']); ?></p>
                <div class="d-flex align-content-center flex-wrap justify-content-center">
                    <img class="img-fluid d-block thumb" src="<?php echo $MYROUTE; ?>/images/<?php echo $post['thumb']; ?>" alt=<?php echo $post['title']; ?>>
                </div>

                <p class="extract"><?php echo utf8_decode((nl2br($post['content']))); ?></p>
            </article>
        </div>
    </div>
    <hr>

</div>
</body>
<!-- FOOTER START -->
<?php require 'footer.php' ?>
<!-- FOOTER END -->