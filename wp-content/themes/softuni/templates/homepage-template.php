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
                <img class="img-fluid" src="<?php echo RESTORANT_ASSETS_URL; ?>/img/hero.png" alt="">
            </div>
        </div>
    </div>
</div>
</div>


<?php
$service_number = get_option('service_number') ? get_option('service_number') : 4;

$hide_service_section = get_option('hide_service_section') ? get_option('hide_service_section') : 'unhide';

$hide_food_section = get_option('hide_food_section') ? get_option('hide_food_section') : 'unhide';


$service_args = array(
    'post_type' => 'service',
    'post_status' => 'publish',
    'posts_per_page' => $service_number,
);

$service_query = new WP_Query($service_args);

$clients_args = array(
    "post_type" => "testimonial",
    "post_status" => "publish",
    "posts_per_page" => 4,
    "paged" => get_query_var("paged"),
);

$clients_query = new WP_Query($clients_args);
?>
<!-- Service -->
<div class="container-xxl py-5" <?php if ($hide_service_section == 'hide') { ?> style="display: none" <?php } ?>>
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
<?php get_template_part( 'partials/content', 'about'); ?>
<!-- About -->


<!-- Menu  -->

<?php
if ($hide_food_section == "unhide") {
    get_template_part('partials/content', 'menu', array( "load_more_button_visible" => 'false' ));
} ?>

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
<?php get_template_part( 'partials/content', 'team'); ?>
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
                                        src="<?php echo RESTORANT_ASSETS_URL; ?>/img/testimonial-1.jpg"
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