<?php get_header(); ?>
<div class="col-md-12 my-4">
    <?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post(); 
            ?>
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title"><?php the_title(); ?></h2>
                    <p class="card-text"><?php the_content(); ?></p>
                </div>
            </div>
            <?php }
        } ?>
</div>
<?php get_footer(); ?>