<?php get_header(); ?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown"> <?php the_title(); ?></h1>
        
    </div>
</div>
</div>

<?php if (have_posts()): ?>
    <?php while (have_posts()):
        the_post(); ?>
        <div <?php post_class("container-xxl py-5 wow fadeInUp") ?> data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h1 class="mb-5">
                        <?php the_title(); ?>
                    </h1>
                </div>
                <div class="testimonial-carousel">

                    <div class="d-flex align-items-center">

                        <div class="ps-3">
                            <?php the_content(); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>