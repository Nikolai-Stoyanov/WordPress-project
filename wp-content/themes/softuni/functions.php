<?php

if (!defined("Restorant_ASSETS_VERSION")) {
    define("Restorant_ASSETS_VERSION", "0.3");
}
;

if (!defined("Restorant_ASSETS_URL")) {
    define("Restorant_ASSETS_URL", get_template_directory_uri() . '/assets/');
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

    wp_enqueue_style("animate", Restorant_ASSETS_URL . "/lib/animate/animate.min.css", array( 'jquery' ), "Restorant_ASSETS_VERSION");
    wp_enqueue_style("owl-carousel", Restorant_ASSETS_URL . "/lib/owlcarousel/assets/owl.carousel.min.css", array(), "Restorant_ASSETS_VERSION");
    wp_enqueue_style("tempusdominus-bootstrap-4", Restorant_ASSETS_URL . "/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css", array(), "Restorant_ASSETS_VERSION");
    wp_enqueue_style("bootstrap", Restorant_ASSETS_URL . "/css/bootstrap.min.css", array(), "Restorant_ASSETS_VERSION");
    wp_enqueue_style("style", Restorant_ASSETS_URL . "/css/style.css", array(), "Restorant_ASSETS_VERSION");

    wp_enqueue_script("wow", Restorant_ASSETS_URL . '/lib/wow/wow.min.js', array( 'jquery' ), Restorant_ASSETS_VERSION, array());
    wp_enqueue_script("easing", Restorant_ASSETS_URL . '/lib/easing/easing.min.js', array( 'jquery' ), Restorant_ASSETS_VERSION, array());
    wp_enqueue_script("wowaypointsw", Restorant_ASSETS_URL . '/lib/waypoints/waypoints.min.js', array( 'jquery' ), Restorant_ASSETS_VERSION, array());
    wp_enqueue_script("counterup", Restorant_ASSETS_URL . '/lib/counterup/counterup.min.js', array( 'jquery' ), Restorant_ASSETS_VERSION, array());
    wp_enqueue_script("owl-carousel.min", Restorant_ASSETS_URL . '/lib/owlcarousel/owl.carousel.min.js', array( 'jquery' ), Restorant_ASSETS_VERSION, array());
    wp_enqueue_script("moment", Restorant_ASSETS_URL . '/lib/tempusdominus/js/moment.min.js', array( 'jquery', 'Moment.js' ), Restorant_ASSETS_VERSION, array());
    wp_enqueue_script("moment-timezone", Restorant_ASSETS_URL . '/lib/tempusdominus/js/moment-timezone.min.js', array( 'jquery', 'Moment.js' ), Restorant_ASSETS_VERSION, array());
    wp_enqueue_script("tempusdominus-bootstrap-4", Restorant_ASSETS_URL . '/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js', array( 'jquery', 'Moment.js' ), Restorant_ASSETS_VERSION, array());
    wp_enqueue_script("main", Restorant_ASSETS_URL . '/js/main.js', array(), Restorant_ASSETS_VERSION, array( 'jquery' ));

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