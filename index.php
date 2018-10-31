<?php get_header(); ?>
<div class="col-md-8">
    <section>
    <h1 class="my-4"><?php echo esc_html( get_option( 'mainHeader', '' ) );?>
        <small><?php echo esc_html( get_option( 'secondaryHeader', '' ) );?></small>
    </h1>
    <?php
        if ( have_posts() ) { // есть ли посты для вывода
            while ( have_posts() ) {
                the_post(); //индекстирует посты
            ?>
            <div class="card mb-4">
            <?php the_post_thumbnail('', $default_attr); // вывод html кода миниатюры (парматры: размер,  атрибуты (класс, alt...) ) ?>
                <div class="card-body">
                    <h2 class="card-title"><?php the_title(); ?></h2>
                    <p class="card-text"><?php the_content(); ?></p>
                </div>
                <div class="card-footer text-muted">
                    <?php $admin = the_author('', '', false); ?>
                    <?php the_date('d.m.Y', 'Публикаци от ', "&nbsp;<a href='#'>" .$admin . "</a>"); ?>
                </div>
            </div>
            <?php }
        } ?>
    </section>
</div>
<div class="col-md-4">
<aside>
<?php dynamic_sidebar('right-sidebar'); // название (id) панели ?>
</aside>
</div>
<?php get_footer(); ?>