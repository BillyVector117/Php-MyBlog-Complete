<!-- HEADER START -->
<?php
require 'header.php';
?>
<!-- HEADER END -->
<div class="container text-center mt-5">
    <div class="jumbotron jumbotron-fluid">
        <div class="post">
            <article class="container">
                <h2 class="display-4 title">Login section</h2>
                <div class="d-flex justify-content-center mt-5">
                    <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="form-group">
                            <input class="form-control w-100" type="text" name="user" placeholder="Username">
                        </div>
                        <div class="form-group mt-2">
                            <input class="form-control w-100" type="password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group mt-2">
                            <input class="btn btn-secondary" type="submit" value="Log me in">
                        </div>
                    </form>
                </div>
            </article>
        </div>
    </div>
    <hr>
</div>
</body>
<!-- FOOTER START -->
<?php require 'footer.php' ?>
<!-- FOOTER END -->