<?php
require 'admin.header.php';
?>

<div class="container text-center mt-5">
    <div class="jumbotron jumbotron-fluid">
        <h4 class="d-flex"><a class="text-decoration-none" href="<?php echo ROUTE . '/admin'; ?>"><i class="fas fa-chevron-circle-left"></i> Go back</a></h4>
        <div class="post">
            <h2 class="display-4 title text-center">New article</h2>
            <article class="container d-flex justify-content-center">
                <form class="form " method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <div class="form-group m-2 w-100">
                        <label class="d-flex" for="title">Title: </label>
                        <input class="form-control border border-primary" type="text" id="title" name="title" placeholder="Article title">
                    </div>
                    <div class="form-group m-2 w-100">
                        <label class="d-flex" for="extract">Extract: </label>
                        <input class="form-control border border-primary" type="text" id="extract" name="extract" placeholder="Article extract">
                    </div>
                    <div class="form-group m-2 w-100">
                        <label class="d-flex" for="content">Content: </label>
                        <textarea class="form-control textarea border border-info" id="content" name="text" id="text" placeholder="Article content"></textarea>
                    </div>
                    <div class="form-group m-2">
                        <label class="d-flex" for="file">File: </label>
                        <input type="file" id="file" name="thumb">
                    </div>
                    <div class="d-flex justify-content-center m-2">
                        <input class="btn btn-success" type="submit" value="Create article">
                    </div>
                </form>
            </article>
        </div>
    </div>
</div>
<?php
require 'footer.php';
?>