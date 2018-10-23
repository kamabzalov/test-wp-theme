<?php

require 'inc/categories-widget.php';
require 'inc/text-widget.php';

// атрибуты для миниатюры
$default_attr = array(
	'class' => "card-img-top",
);

/**
 * Загружает стили и скрипты темы
 */
function loadScripts() {
    wp_enqueue_style( 'bootstrap-styles', get_template_directory_uri(). '/css/bootstrap.min.css' );
    wp_enqueue_style( 'main-theme-style', get_stylesheet_uri() );
    wp_enqueue_script( 'bsscript', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array( 'jquery' ), '20150330', true );
}

function changeMenuItemsClass($class) {
    $classes[] = "nav-item";
    return $classes;
}

function addLinkClass($atts) {
	$atts['class'] = 'nav-link';
    return $atts;
}

function createWidgetsArea() {
    register_sidebar(
        array (
            'name'  => 'Справа',
            'id'    =>   'right-sidebar',
            'before_widget' => '<div class="card my-4">',
            'after_widget' => "</div>",
            'before_title' => '<h5 class="card-header">',
            'after_title' => '</h5>',
        )
    );
}

function modify_read_more_link() {
    return '<p><a class="btn btn-primary" href="' . get_permalink() . '">Read More →</a></p>';
}

function categoriesWidgetRegister() {
    unregister_widget( 'WP_Widget_Categories' );
    register_widget( 'CategoriesWidget' );
}

function textWidgetRegister() {
    unregister_widget( 'WP_Widget_Text' );
    register_widget( 'TextWidget' );
}

// Добавялем функцию к стандартному хуку загрузки скриптов
add_action( 'wp_enqueue_scripts', 'loadScripts');

// Добавялем функцию к стандартному хуку создания виджетов
add_action( 'widgets_init', 'createWidgetsArea');

// Инициализируем свой виджет категорий
add_action("widgets_init", "categoriesWidgetRegister");

// Инициализируем свой текстовый виджет
add_action("widgets_init", "textWidgetRegister");

// Фильтр для изменения классов <li> в меню
add_filter( 'nav_menu_css_class', 'changeMenuItemsClass');

// Фильтр для изменения классов <a> в меню
add_filter( 'nav_menu_link_attributes', 'addLinkClass');

// Фильтра для ссылка "Читать далее"
add_filter( 'the_content_more_link', 'modify_read_more_link' );

// Добавляет поддержку превью для постов
add_theme_support( 'post-thumbnails' ); 

register_nav_menu('main-menu','Главное меню');

// Цепляем функцию к хуку admin_init
add_action('admin_init', 'getHeaderText');

function getHeaderText() {
    register_setting('general', 'mainHeader', 'sanitize_text_field');
    register_setting('general', 'secondaryHeader', 'sanitize_text_field');
    
    add_settings_field(
        'mainHeader', 
        '<label for="mainHeader">Первичный заголовок</label>',
        'mainHeaderHtml',
        'general'
    );

    add_settings_field(
        'secondaryHeader', 
        '<label for="secondaryHeader">Вторичный заголовок</label>',
        'secondaryHeaderHtml',
        'general'
    );
}

function mainHeaderHtml() {
	$value = get_option( 'mainHeader', '' );
	printf( '<input type="text" id="mainHeader" name="mainHeader" value="%s" />', esc_attr( $value ) );
}

function secondaryHeaderHtml() {
    $value = get_option( 'secondaryHeader', '' );
	printf( '<input type="text" id="secondaryHeader" name="secondaryHeader" value="%s" />', esc_attr( $value ) );
}