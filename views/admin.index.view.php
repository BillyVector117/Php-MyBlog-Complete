<!-- HEADER START -->
<?php
require 'admin.header.php';
?>
<!-- HEADER END -->

<!-- ITERATION DATA START -->
<div class="container d-block">
    <h2>Panel Control</h2>
    <a href="newPost.php" class="btn btn-success">New Post</a>
    <a href="logOut.php" class="btn btn-danger">Log out</a>
</div>
<hr>
<h2 class="text-center text-success">All Posts here:</h2>
<?php foreach ($posts as $post) : ?>
    <div class="container text-center mt-5">
        <div class="jumbotron jumbotron-fluid">
            <div class="post">
                <article class="">
                    <h2 class="title"><?php echo $post['id'] . '.-' . $post['title']; ?></h2>
                    <a href="../single.php?id=<?php echo $post['id']; ?>">View</a>
                    <a href="edit.php?id=<?php echo $post['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $post['id']; ?>">Delete</a>
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