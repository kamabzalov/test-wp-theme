<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
    <?php wp_head(); ?> 
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <?php wp_nav_menu( 
                        // Посмотреть в файл wp-inlcudes/nav-menu-template.php строки 197,237
                        array (
		                    'menu_id'           => '',
                            'menu_class'        => 'navbar-nav ml-auto',
                            'container'         => '',
                            'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>'
                        )
                    ); ?>
                </div>
            </div>
        </nav>
    </header>
    <div id="content">
        <div class="container">
            <div class="row">
