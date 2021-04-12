<?php
require 'admin.header.php';
?>

<div class="container text-center mt-5">
    <div class="jumbotron jumbotron-fluid">
        <div class="post">
            <article class="">
                <h2 class="display-4 title">Edit article</h2>
                <form class="form" method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <div class="form-group m-2">
                        <input class="form-control" type="hidden" name="id" value="<?php echo $post['id'] ?>">
                    </div>
                    <div class="form-group m-2">
                        <label class="d-flex" for="title">Title: </label>
                        <input class="form-control border border-success" type="text" id="title" name="title" value="<?php echo $post['title'] ?>">
                    </div>
                    <div class="form-group m-2">
                        <label class="d-flex" for="extract">Extract: </label>
                        <input class="form-control border border-success" type="text" id="extract" name="extract" value="<?php echo $post['extract'] ?>">
                    </div>
                    <div class="form-group m-2">
                        <label class="d-flex" for="content">Content: </label>
                        <textarea class="form-control border border-success" name="text" id="content"><?php echo $post['content'] ?></textarea>
                    </div>
                    <div class="form-group m-2">
                        <label for="file">File: </label>
                        <input type="file" name="thumb" id="file">
                    </div>
                    <div class="form-group m-2">
                        <!-- This hidden input will save the previous or current thumb value (if user change choose no change thumb)-->
                        <input type="hidden" name="saved_thumb" value="<?php echo $post['thumb'] ?>">
                    </div>
                    <div class="d-flex justify-content-center m-2">
                        <input class="btn btn-success" type="submit" value="Update">
                    </div>
                </form>
            </article>
        </div>
    </div>
</div>
<?php
require 'footer.php';
?>