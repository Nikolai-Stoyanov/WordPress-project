<?php get_header(); ?>

    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">404</h1>
        </div>
    </div>
</div>

<div <?php post_class("container-xxl py-5") ?>>
    <div class="container">
        <div class="text-center">
            <h1 class="mb-5">
                <?php _e( 'Sorry, no posts found', 'softuni'); ?>
            </h1>
        </div>
        <div class="testimonial-carousel">

            <div class="d-flex align-items-center">

                <div class="ps-3">
                    <?php _e( 'please check later', 'softuni'); ?>
                </div>

            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>