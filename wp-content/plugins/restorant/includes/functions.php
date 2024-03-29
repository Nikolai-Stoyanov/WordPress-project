<?php

function show_profession_by_id( $atts ){
    $shortcode_atts = shortcode_atts(
        array(
            'id' => '',
        ),
        $atts
    );

    $profession = '';

    if (!empty($shortcode_atts[ 'id' ])) {
        $profession = get_post_meta($shortcode_atts[ 'id' ], 'profession', true);
    }

    return $profession;
}
add_shortcode( 'show_profession', 'show_profession_by_id' );




function more_post_ajax(){
    $ppp = ( isset( $_POST[ "posts_per_page" ])) ? $_POST["posts_per_page"] : 4;
    $page = ( isset( $_POST[ 'paged' ])) ? $_POST['paged'] : 0;
    $type = ( isset( $_POST[ 'post_type' ])) ? $_POST['post_type'] : null;

    header("Content-Type: text/html");
    $args = array(
        "post_type" => "food",
        "post_status" => "publish",
        "posts_per_page" => $ppp,
        "paged" => $page,
        'meta_query' => array(
            array(
                'key' => 'food_type',
                'value' => $type,
                'compare' => '='
            )
        ),
    );

    $loop = new WP_Query($args);

    if ($loop->have_posts()):
        while ($loop->have_posts()):
            $loop->the_post(); 
             get_template_part( 'partials/content', 'menu-item' );
        endwhile;
    endif;
    wp_reset_postdata();
    die();
}

add_action( 'wp_ajax_nopriv_more_post_ajax', 'more_post_ajax' );
add_action( 'wp_ajax_more_post_ajax', 'more_post_ajax' );


function options_page(){
    add_menu_page(
        'Option page',
        'Option page',
        'manage_options',
        'my-options',
        'options_page_html'
    );
}
add_action( 'admin_menu', 'options_page' );

function options_page_html(){
    include RESTORANT_PLUGIN_INCLUDES_DIR . '/options-page.php';
}