<?php


function show_profession_by_id($atts)
{
    $shortcode_atts = shortcode_atts(
        array(
            'id' => '',
        ),
        $atts
    );

    $profession = '';

    if (!empty($shortcode_atts['id'])) {
        $profession = get_post_meta($shortcode_atts['id'], 'profession', true);
    }

    return $profession;
}
add_shortcode('show_profession', 'show_profession_by_id');




function more_post_ajax()
{
    $ppp = (isset($_POST["posts_per_page"])) ? $_POST["posts_per_page"] : 4;
    $page = (isset($_POST['paged'])) ? $_POST['paged'] : 0;
    $type = (isset($_POST['post_type'])) ? $_POST['post_type'] : null;

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
            $loop->the_post(); ?>
            <div class="col-lg-6">
                <a href="<?php the_permalink(); ?>" style="cursor:pointer;">
                    <div class="d-flex align-items-center">
                        <?php the_post_thumbnail('post-thumbnail', [ 'class' => 'flex-shrink-0 img-fluid rounded s', 'style' => 'width:80px; height:80px' ]); ?>
                        <div class="w-100 d-flex flex-column text-start ps-4">
                            <h3 class="d-flex justify-content-between border-bottom pb-2">
                                <span
                                    style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;">
                                    <?php the_title(); ?>
                                </span>
                                <span class="text-primary" style="display: -webkit-box">
                                    <?php $price_value = get_post_meta(get_the_ID(), 'price', true);
                                    echo "<span class='box'>$$price_value</span>"; ?>
                                </span>
                            </h3>
                            <small class="fst-italic"
                                style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;">
                                <?php the_content(); ?>
                            </small>
                        </div>
                    </div>
                </a>
            </div>
            <?php
        endwhile;
    endif;
    wp_reset_postdata();
    die();
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');




/**
 * Add the top level menu page.
 */
function softuni_options_page()
{
    add_menu_page(
        'SoftUni',
        'SoftUni Options',
        'manage_options',
        'softuni-options',
        'softuni_options_page_html'
    );
}
/**
 * Register our softuni_options_page to the admin_menu action hook.
 */
add_action('admin_menu', 'softuni_options_page');

function softuni_options_page_html()
{
    include RESTORANT_PLUGIN_INCLUDES_DIR . '/options-page.php';
}