<?php

if (!defined("RESTORANT_ASSETS_VERSION")) {
    define("RESTORANT_ASSETS_VERSION", "0.3");
}
;

if (!defined("RESTORANT_ASSETS_URL")) {
    define("RESTORANT_ASSETS_URL", get_template_directory_uri() . '/assets/');
}
;

add_theme_support('title-tag');
add_theme_support('post-thumbnails');

/**
 * Function that enqueue all of assets
 * 
 * @return void
 */

function restorant_enqueue_assets()
{

    wp_enqueue_style("animate", RESTORANT_ASSETS_URL . "/lib/animate/animate.min.css", array( 'jquery' ), "RESTORANT_ASSETS_VERSION");
    wp_enqueue_style("owl-carousel", RESTORANT_ASSETS_URL . "/lib/owlcarousel/assets/owl.carousel.min.css", array(), "RESTORANT_ASSETS_VERSION");
    wp_enqueue_style("tempusdominus-bootstrap-4", RESTORANT_ASSETS_URL . "/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css", array(), "RESTORANT_ASSETS_VERSION");
    wp_enqueue_style("bootstrap", RESTORANT_ASSETS_URL . "/css/bootstrap.min.css", array(), "RESTORANT_ASSETS_VERSION");
    wp_enqueue_style("style", RESTORANT_ASSETS_URL . "/css/style.css", array(), "RESTORANT_ASSETS_VERSION");

    wp_enqueue_script("wow", RESTORANT_ASSETS_URL . '/lib/wow/wow.min.js', array( 'jquery' ), RESTORANT_ASSETS_VERSION, array());
    wp_enqueue_script("easing", RESTORANT_ASSETS_URL . '/lib/easing/easing.min.js', array( 'jquery' ), RESTORANT_ASSETS_VERSION, array());
    wp_enqueue_script("wowaypointsw", RESTORANT_ASSETS_URL . '/lib/waypoints/waypoints.min.js', array( 'jquery' ), RESTORANT_ASSETS_VERSION, array());
    wp_enqueue_script("counterup", RESTORANT_ASSETS_URL . '/lib/counterup/counterup.min.js', array( 'jquery' ), RESTORANT_ASSETS_VERSION, array());
    wp_enqueue_script("owl-carousel.min", RESTORANT_ASSETS_URL . '/lib/owlcarousel/owl.carousel.min.js', array( 'jquery' ), RESTORANT_ASSETS_VERSION, array());
    wp_enqueue_script("moment", RESTORANT_ASSETS_URL . '/lib/tempusdominus/js/moment.min.js', array( 'jquery', 'Moment.js' ), RESTORANT_ASSETS_VERSION, array());
    wp_enqueue_script("moment-timezone", RESTORANT_ASSETS_URL . '/lib/tempusdominus/js/moment-timezone.min.js', array( 'jquery', 'Moment.js' ), RESTORANT_ASSETS_VERSION, array());
    wp_enqueue_script("tempusdominus-bootstrap-4.min", RESTORANT_ASSETS_URL . '/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js', array( 'jquery', 'Moment.js' ), RESTORANT_ASSETS_VERSION, array());
    wp_enqueue_script("main", RESTORANT_ASSETS_URL . '/js/main.js', array(), RESTORANT_ASSETS_VERSION, array( 'jquery' ));

}
;
add_action("wp_enqueue_scripts", "restorant_enqueue_assets");


function restorant_register_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu', 'softuni')
        )
    );
}
add_action("init", "restorant_register_menus");


add_image_size('square-80', 80, 80, true);
add_image_size('square-150', 150, 150, true);
add_image_size('square-400', 400, 400, true);
add_image_size('square-50', 50, 50, true);


function restorant_sidebars()
{

    register_sidebar(
        array(
            'id' => 'footer-company',
            'name' => __('Footer Company'),
            'description' => __('A short description of the sidebar.'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title" style="display: none;">',
            'after_title' => '</h3>',
        )
    );
    register_sidebar(
        array(
            'id' => 'footer-opening',
            'name' => __('Footer Opening'),
            'description' => __('A short description of the sidebar.'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
    register_sidebar(
        array(
            'id' => 'footer-newsletter',
            'name' => __('Footer Newsletter'),
            'description' => __('A short description of the sidebar.'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );

}


add_action('widgets_init', 'restorant_sidebars');