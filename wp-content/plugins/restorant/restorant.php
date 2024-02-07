<?php
/*
 * @wordpress-plugin
 * Plugin Name:       Restorant
 * Plugin URI:        
 * Description:       My plugin
 * Version:           1.0.0
 * Requires at least: 5.0
 * Requires PHP:      8.0
 * Author:            Nikolay
 * Author URI:       
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       softuni
 * Domain Path:       /languages
 */

 if ( ! defined("RESTORANT_PLUGIN_DIR") ){
    define("RESTORANT_PLUGIN_DIR", plugin_dir_path( __FILE__ ) . "includes");
 };

 if ( ! defined("RESTORANT_PLUGIN_INCLUDES_DIR") ){
    define("RESTORANT_PLUGIN_INCLUDES_DIR", plugin_dir_path( __FILE__ ) . "includes");
 };

 if ( ! defined("RESTORANT_PLUGIN_INCLUDES_ASSETS_DIR") ){
   define("RESTORANT_PLUGIN_INCLUDES_ASSETS_DIR", plugins_url( "assets", __FILE__ ) );
};

 require RESTORANT_PLUGIN_INCLUDES_DIR . "/functions.php";
 require RESTORANT_PLUGIN_INCLUDES_DIR . "/restorant.php";



function restorant_plugin_enqueue_assets() {
   wp_enqueue_script(
       "restorant-assets-plugin", 
       RESTORANT_PLUGIN_INCLUDES_ASSETS_DIR ."/js/scripts.js", 
       array("jquery"),
       "1.2"
   );


       wp_localize_script( 'restorant-assets-plugin', 'ajax_posts', array(
           'ajaxurl' => admin_url( 'admin-ajax.php' ),
           'noposts' => __('No older posts found', 'twentyfifteen'),
       ));


}
add_action("wp_enqueue_scripts","restorant_plugin_enqueue_assets");