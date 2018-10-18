<div class="card-body">
    <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="input-group">
            <input type="text" class="form-control" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Поиск..." />
            <span class="input-group-btn">
                <input class="btn btn-secondary" type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
            </span>
        </div>
    </form>
</div>
