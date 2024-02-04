<?php

if (!defined("ROBOTS_FACTORY_ASSETS_VERSION")) {
    define("ROBOTS_FACTORY_ASSETS_VERSION", "0.1");
};

if (!defined("ROBOTS_FACTORY_ASSETS_URL")) {
    define("ROBOTS_FACTORY_ASSETS_URL", get_template_directory_uri() . '/assets/');
};

add_theme_support('title-tag');
add_theme_support('post-thumbnails');

/**
 * Function that enqueue all of assets
 * 
 * @return void
 */

function restorant_enqueue_assets()
{

    wp_enqueue_style("animate", ROBOTS_FACTORY_ASSETS_URL . "/lib/animate/animate.min.css", array(), "ROBOTS_FACTORY_ASSETS_VERSION");
    wp_enqueue_style("carousel", ROBOTS_FACTORY_ASSETS_URL . "/lib/owlcarousel/assets/owl.carousel.min.css", array(), "ROBOTS_FACTORY_ASSETS_VERSION");
    wp_enqueue_style("tempusdominus-bootstrap-4", ROBOTS_FACTORY_ASSETS_URL . "/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css", array(), "ROBOTS_FACTORY_ASSETS_VERSION");
    wp_enqueue_style("bootstrap", ROBOTS_FACTORY_ASSETS_URL . "/css/bootstrap.min.css", array(), "ROBOTS_FACTORY_ASSETS_VERSION");
    wp_enqueue_style("style", ROBOTS_FACTORY_ASSETS_URL . "/css/style.css", array(), "ROBOTS_FACTORY_ASSETS_VERSION");

    wp_enqueue_script("wow", ROBOTS_FACTORY_ASSETS_URL . '/lib/wow/wow.min.js', array('jquery'), ROBOTS_FACTORY_ASSETS_VERSION, array());
    wp_enqueue_script("easing", ROBOTS_FACTORY_ASSETS_URL . '/lib/easing/easing.min.js', array('jquery'), ROBOTS_FACTORY_ASSETS_VERSION, array());
    wp_enqueue_script("wowaypointsw", ROBOTS_FACTORY_ASSETS_URL . '/lib/waypoints/waypoints.min.js', array('jquery'), ROBOTS_FACTORY_ASSETS_VERSION, array());
    wp_enqueue_script("counterup", ROBOTS_FACTORY_ASSETS_URL . '/lib/counterup/counterup.min.js', array('jquery'), ROBOTS_FACTORY_ASSETS_VERSION, array());
    wp_enqueue_script("owl.carousel", ROBOTS_FACTORY_ASSETS_URL . 'lib/owlcarousel/owl.carousel.min.js', array('jquery'), ROBOTS_FACTORY_ASSETS_VERSION, array());
    wp_enqueue_script("moment", ROBOTS_FACTORY_ASSETS_URL . '/lib/tempusdominus/js/moment.min.js', array('jquery'), ROBOTS_FACTORY_ASSETS_VERSION, array());
    wp_enqueue_script("moment-timezone", ROBOTS_FACTORY_ASSETS_URL . '/lib/tempusdominus/js/moment-timezone.min.js', array('jquery'), ROBOTS_FACTORY_ASSETS_VERSION, array());
    wp_enqueue_script("tempusdominus-bootstrap-4", ROBOTS_FACTORY_ASSETS_URL . '/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js', array('jquery'), ROBOTS_FACTORY_ASSETS_VERSION, array());
    wp_enqueue_script("main", ROBOTS_FACTORY_ASSETS_URL . '/js/main.js', array(), ROBOTS_FACTORY_ASSETS_VERSION, array('jquery'));

};
add_action("wp_enqueue_scripts", "restorant_enqueue_assets");


function restoran_register_menus() {
    register_nav_menus(
        array(
        'header-menu' => __('Header Menu')
        )
        );
}
add_action("init", "restoran_register_menus");