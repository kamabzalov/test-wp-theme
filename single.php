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
                    <?php the_content(); ?>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <h2>Комментарии</h2>
                            <?php
                                $comments = get_comments();
                                $args = array('class' => 'mr-3');
                                foreach($comments as $comment) { 
                            ?>
                                <div class="media mb-3">
                                    <?php echo get_avatar($comment->author_email, 64, null, null, $args); ?>
                                    <div class="media-body">
                                        <h5 class="mt-0"><?php echo $comment->comment_author; ?></h5>
                                        <?php echo $comment->comment_content; ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <hr>
                    <?php
                        $args = array(
                                'fields' => array
                                    (
                                        'author' => '<div class="form-group">' . '<label for="author">' . __( 'Name' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
                                            '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
                                        'email'  => '<div class="form-group"><label for="email">' . __( 'Email' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
                                            '<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>'
                                    ),
                                'comment_field'         => '<div class="form-group"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label> <textarea id="comment" name="comment" class="form-control"  aria-required="true" required="required"></textarea></div>',
                                'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="btn btn-primary" value="%4$s" />'
                            );
                        comment_form($args);
                    ?>
                </div>
            </div>
            <?php }
        } ?>
</div>
<?php get_footer(); ?>