<?php // Template Name: homepage ?>
<?php get_header(); ?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container my-5 py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-3 text-white animated slideInLeft">Enjoy Our<br>Delicious Meal</h1>
                <p class="text-white animated slideInLeft mb-4 pb-2">Tempor erat elitr rebum at clita. Diam dolor diam
                    ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita
                    duo justo magna dolore erat amet</p>
                <a href="#reservation" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Book A
                    Table</a>
            </div>
            <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                <img class="img-fluid" src="<?php echo Restorant_ASSETS_URL; ?>/img/hero.png" alt="">
            </div>
        </div>
    </div>
</div>
</div>


<?php
$service_number = get_option('service_number') ? get_option('service_number') : 4;

$food_number = get_option('food_number') ? get_option('food_number') : 4;

$hide_service_section = get_option('hide_service_section') ? get_option('hide_service_section') : 'unhide';

$hide_food_section = get_option('hide_food_section') ? get_option('hide_food_section') : 'unhide';


$service_args = array(
    'post_type' => 'service',
    'post_status' => 'publish',
    'posts_per_page' => $service_number,
);

$service_query = new WP_Query($service_args);

$team_args = array(
    "post_type" => "team",
    "post_status" => "publish",
    "posts_per_page" => 4,
    "paged" => get_query_var("paged"),
);

$team_query = new WP_Query($team_args);

$clients_args = array(
    "post_type" => "testimonial",
    "post_status" => "publish",
    "posts_per_page" => 4,
    "paged" => get_query_var("paged"),
);

$clients_query = new WP_Query($clients_args);

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
<!-- Service -->
<div class="container-xxl py-5" <?php if($hide_service_section=='hide'){ ?> style="display: none" <?php } ?>>
    <div class="container">
        <div class="row g-4">
            <?php if ($service_query->have_posts()): ?>
                <?php while ($service_query->have_posts()):
                    $service_query->the_post() ?>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x <?php $icon_value = get_post_meta(get_the_ID(), 'icon', true);
                                echo "$icon_value"; ?> text-primary mb-4"></i>
                                <h5>
                                    <?php the_title(); ?>
                                </h5>
                                <p>
                                    <?php the_content(); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</div>
<!-- Service -->


<!-- About-->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s"
                            src="<?php echo Restorant_ASSETS_URL; ?>/img/about-1.jpg">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s"
                            src="<?php echo Restorant_ASSETS_URL; ?>/img/about-2.jpg" style="margin-top: 25%;">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s"
                            src="<?php echo Restorant_ASSETS_URL; ?>/img/about-3.jpg">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s"
                            src="<?php echo Restorant_ASSETS_URL; ?>/img/about-4.jpg">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                <h1 class="mb-4">Welcome to <i class="fa fa-utensils text-primary me-2"></i>Restoran</h1>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos
                    erat ipsum et lorem et sit, sed stet lorem sit.</p>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et
                    eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                <div class="row g-4 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15</h1>
                            <div class="ps-4">
                                <p class="mb-0">Years of</p>
                                <h6 class="text-uppercase mb-0">Experience</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">50</h1>
                            <div class="ps-4">
                                <p class="mb-0">Popular</p>
                                <h6 class="text-uppercase mb-0">Master Chefs</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-primary py-3 px-5 mt-2" href="./about">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About -->


<!-- Menu  -->
<div class="container-xxl py-5" <?php if($hide_food_section=='hide'){ ?> style="display: none" <?php } ?>>
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
            <h1 class="mb-5">Most Popular Items</h1>
        </div>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill"
                        href="#tab-1">
                        <i class="fa fa-coffee fa-2x text-primary"></i>
                        <div class="ps-3">
                            <small class="text-body">Popular</small>
                            <h6 class="mt-n1 mb-0">Breakfast</h6>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
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
                    <div class="row g-4">
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
                </div>
                <div id="tab-2" class="tab-pane fade show p-0">
                    <div class="row g-4">
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
                </div>
                <div id="tab-3" class="tab-pane fade show p-0">
                    <div class="row g-4">
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Menu -->


<!-- Reservation -->
<div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s" id="reservation">
    <div class="row g-0">
        <div class="col-md-6">
            <div class="video">
            </div>
        </div>
        <div class="col-md-6 bg-dark d-flex align-items-center">
            <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                <h1 class="text-white mb-4">Book A Table Online</h1>
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" placeholder="Your Name">
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating date" id="date3" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" id="datetime"
                                    placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                <label for="datetime">Date & Time</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" id="select1">
                                    <option value="1">People 1</option>
                                    <option value="2">People 2</option>
                                    <option value="3">People 3</option>
                                </select>
                                <label for="select1">No Of People</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Special Request" id="message"
                                    style="height: 100px"></textarea>
                                <label for="message">Special Request</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                        allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Reservation -->


<!-- Team -->
<div class="container-xxl pt-5 pb-3">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Team Members</h5>
            <h1 class="mb-5">Our Master Chefs</h1>
        </div>
        <div class="row g-4">
            <?php if ($team_query->have_posts()): ?>
                <?php while ($team_query->have_posts()):
                    $team_query->the_post(); ?>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a href="<?php the_permalink(); ?>" style="cursor:pointer;">
                            <div class="team-item text-center rounded overflow-hidden">
                                <div class="rounded-circle overflow-hidden m-4">
                                    <?php if (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail('post-thumbnail', [ 'class' => 'img-fluid' ]); ?>
                                    <?php else: ?>
                                        <img class="img-fluid" src="<?php echo Restorant_ASSETS_URL; ?>img/team-1.jpg" alt="">
                                    <?php endif; ?>
                                </div>
                                <h5 class="mb-0">
                                    <?php the_title(); ?>
                                </h5>
                                <small>
                                    <?php $job_value = get_post_meta(get_the_ID(), 'job', true);
                                    echo "<span class='box'>$job_value</span>";
                                    ?>
                                </small>
                                <div class="d-flex justify-content-center mt-3">
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
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
    </div>
</div>
<!-- Team -->


<!-- Testimonial -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.2s">
    <div class="container">
        <div class="text-center">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonial</h5>
            <h1 class="mb-5">Our Clients Say!!!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <?php if ($clients_query->have_posts()): ?>
                <?php while ($clients_query->have_posts()):
                    $clients_query->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" style="cursor:pointer;">
                        <div class="testimonial-item bg-transparent border rounded p-4" style="margin-right:10px">
                            <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                            <div
                                style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;">
                                <?php the_content(); ?>
                            </div>
                            <div class="d-flex align-items-center">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('post-thumbnail', [ 'class' => 'img-fluid flex-shrink-0 rounded-circle square-50', 'style' => 'width:100px' ]); ?>
                                <?php else: ?>
                                    <img class="img-fluid flex-shrink-0 rounded-circle"
                                        src="<?php echo Restorant_ASSETS_URL; ?>/img/testimonial-1.jpg"
                                        style="width: 50px; height: 50px;">
                                <?php endif; ?>
                                <div class="ps-3">
                                    <h5 class="mb-1">
                                        <?php the_title(); ?>
                                    </h5>
                                    <small>
                                        <?php $profession_value = get_post_meta(get_the_ID(), 'profession', true);
                                        echo "<span class='box'>$profession_value</span>";
                                        ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>