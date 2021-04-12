<!-- $blog_config and $connection variables most to be available in the section that this partial is executed/used ('Index' module in this case)-->
<?php $pages_amount = pages_amount($blog_config['posts_per_page'], $connection); ?>
<div class="d-flex">
    <section class="pagination ml-auto">
        <ul class="">
            <?php if (current_page() === 1) : ?>
                <li class="disabled">&laquo;</li>
            <?php else : ?>
                <!-- Redirect -1 page -->
                <li><a href="index.php?page=<?php echo current_page() - 1 ?>">&laquo;</a></li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $pages_amount; $i++) : ?>
                <?php if (current_page() == $i) : ?>
                    <li class="active"><?php echo $i ?></li>
                <?php else : ?>
                    <li><a href="index.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                <?php endif ?>
            <?php endfor; ?>

            <!-- Right arrow -->
            <?php if (current_page() == $pages_amount) : ?>
                <li class="disabled">&raquo;</li>
            <?php else : ?>
                <!-- Redirect +1 page -->
                <li><a href="index.php?page=<?php echo current_page() + 1 ?>">&raquo;</a></li>
            <?php endif; ?>
        </ul>
    </section>
</div>