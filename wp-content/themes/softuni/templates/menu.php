<?php // Template Name: menu ?>
<?php get_header(); ?>

    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">
                <?php _e('Food Menu', 'softuni'); ?>
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="<?php echo esc_url(get_home_url()); ?>">
                            <?php _e('Home', 'softuni'); ?>
                        </a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">
                        <?php _e('Menu', 'softuni'); ?>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>



<?php
$food_number = get_option('food_number') ? get_option('food_number') : 4;

$restorant_breakfast_menu_arg = array(
    "post_type" => "food",
    "post_status" => "publish",
    "posts_per_page" => $food_number,
    "paged" => get_query_var("paged"),
    'meta_query' => array(
        array(
            'key' => 'food_type',
            'value' => 'Breakfast',
            'compare' => '='
        )
    ),
);
$restorant_launch_menu_arg = array(
    "post_type" => "food",
    "post_status" => "publish",
    "posts_per_page" => $food_number,
    "paged" => get_query_var("paged"),
    'meta_query' => array(
        array(
            'key' => 'food_type',
            'value' => 'Launch',
            'compare' => '='
        )
    ),
);
$restorant_dinner_menu_arg = array(
    "post_type" => "food",
    "post_status" => "publish",
    "posts_per_page" => $food_number,
    "paged" => get_query_var("paged"),
    'meta_query' => array(
        array(
            'key' => 'food_type',
            'value' => 'Dinner',
            'compare' => '='
        )
    ),
);

$restorant_breakfast_menu_query = new WP_Query($restorant_breakfast_menu_arg);
$restorant_launch_menu_query = new WP_Query($restorant_launch_menu_arg);
$restorant_dinner_menu_query = new WP_Query($restorant_dinner_menu_arg);
?>



<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
            <h1 class="mb-5">Most Popular Items</h1>
        </div>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                <li class="nav-item myTab">
                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill"
                        href="#tab-1">
                        <i class="fa fa-coffee fa-2x text-primary"></i>
                        <div class="ps-3">
                            <small class="text-body">Popular</small>
                            <h6 class="mt-n1 mb-0">Breakfast</h6>
                        </div>
                    </a>
                </li>
                <li class="nav-item myTab">
                    <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                        <i class="fa fa-hamburger fa-2x text-primary"></i>
                        <div class="ps-3">
                            <small class="text-body">Special</small>
                            <h6 class="mt-n1 mb-0">Launch</h6>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                        <i class="fa fa-utensils fa-2x text-primary"></i>
                        <div class="ps-3">
                            <small class="text-body">Lovely</small>
                            <h6 class="mt-n1 mb-0">Dinner</h6>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4" id="ajax_posts_breakfast">
                        <?php if ($restorant_breakfast_menu_query->have_posts()): ?>
                            <?php while ($restorant_breakfast_menu_query->have_posts()):
                                $restorant_breakfast_menu_query->the_post(); ?>

                                <div class="col-lg-6">
                                    <a href="<?php the_permalink(); ?>" style="cursor:pointer;">
                                        <div class="d-flex align-items-center">
                                            <?php if (has_post_thumbnail()): ?>
                                                <?php the_post_thumbnail('square-80'); ?>
                                            <?php else: ?>
                                                <img class="flex-shrink-0 img-fluid rounded"
                                                    src="<?php echo Restorant_ASSETS_URL; ?>/img/menu-2.jpg" style="width: 80px;">
                                            <?php endif; ?>
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h3 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span
                                                        style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;">
                                                        <?php the_title(); ?>
                                                    </span>
                                                    <span class="text-primary" style="display: -webkit-box">
                                                        <?php $price_value = get_post_meta(get_the_ID(), 'price', true);
                                                        echo "<span class='box'>$$price_value</span>";
                                                        ?>
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
                            <?php endwhile; ?>
                        <?php else: ?>
                            <?php _e('Sorry, no posts found', 'softuni'); ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                    <div id="more_posts_breakfast" class="more_posts">
                        <style>
                            .more_posts {
                                margin: 10px;
                                display: flex;
                                justify-content: center;
                            }
                            #more_post_button:hover {
                                cursor: pointer;
                                color: orange
                            }
                        </style>
                        <div class="col-lg-2" id="more_post_button">
                            <div>Load More</div>
                            <div><i class="fa fa-solid fa-chevron-down"></i></div>
                        </div>
                    </div>
                </div>
                <div id="tab-2" class="tab-pane fade show p-0">
                    <div class="row g-4" id="ajax_posts_launch">
                        <?php if ($restorant_launch_menu_query->have_posts()): ?>
                            <?php while ($restorant_launch_menu_query->have_posts()):
                                $restorant_launch_menu_query->the_post(); ?>
                                <div class="col-lg-6">
                                    <a href="<?php the_permalink(); ?>" style="cursor:pointer;">
                                        <div class="d-flex align-items-center">
                                            <?php if (has_post_thumbnail()): ?>
                                                <?php the_post_thumbnail('square-80'); ?>
                                            <?php else: ?>
                                                <img class="flex-shrink-0 img-fluid rounded"
                                                    src="<?php echo Restorant_ASSETS_URL; ?>/img/menu-2.jpg" style="width: 80px;">
                                            <?php endif; ?>
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h3 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span
                                                        style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;">
                                                        <?php the_title(); ?>
                                                    </span>
                                                    <span class="text-primary" style="display: -webkit-box">
                                                        <?php $price_value = get_post_meta(get_the_ID(), 'price', true);
                                                        echo "<span class='box'>$$price_value</span>";
                                                        ?>
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
                            <?php endwhile; ?>
                        <?php else: ?>
                            <?php _e('Sorry, no posts found', 'softuni'); ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                    <div id="more_posts_launch" class="more_posts">
                        <style>
                            .more_posts {
                                margin: 10px;
                                display: flex;
                                justify-content: center;
                            }

                            #more_post_button:hover {
                                cursor: pointer;
                                color: orange
                            }
                        </style>
                        <div class="col-lg-2" id="more_post_button">
                            <div>Load More</div>
                            <div><i class="fa fa-solid fa-chevron-down"></i></div>
                        </div>
                    </div>
                </div>
                <div id="tab-3" class="tab-pane fade show p-0">
                    <div class="row g-4" id="ajax_posts_dinner">
                        <?php if ($restorant_dinner_menu_query->have_posts()): ?>
                            <?php while ($restorant_dinner_menu_query->have_posts()):
                                $restorant_dinner_menu_query->the_post(); ?>
                                <div class="col-lg-6">
                                    <a href="<?php the_permalink(); ?>" style="cursor:pointer;">
                                        <div class="d-flex align-items-center">
                                            <?php if (has_post_thumbnail()): ?>
                                                <?php the_post_thumbnail('square-80'); ?>
                                            <?php else: ?>
                                                <img class="flex-shrink-0 img-fluid rounded"
                                                    src="<?php echo Restorant_ASSETS_URL; ?>/img/menu-2.jpg" style="width: 80px;">
                                            <?php endif; ?>
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h3 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span
                                                        style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;">
                                                        <?php the_title(); ?>
                                                    </span>
                                                    <span class="text-primary" style="display: -webkit-box">
                                                        <?php $price_value = get_post_meta(get_the_ID(), 'price', true);
                                                        echo "<span class='box'>$$price_value</span>";
                                                        ?>
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
                            <?php endwhile; ?>
                        <?php else: ?>
                            <?php _e('Sorry, no posts found', 'softuni'); ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                    <div id="more_posts_dinner" class="more_posts">
                        <style>
                            .more_posts {
                                margin: 10px;
                                display: flex;
                                justify-content: center;
                            }

                            #more_post_button:hover {
                                cursor: pointer;
                                color: orange
                            }
                        </style>
                        <div class="col-lg-2" id="more_post_button">
                            <div>Load More</div>
                            <div><i class="fa fa-solid fa-chevron-down"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>