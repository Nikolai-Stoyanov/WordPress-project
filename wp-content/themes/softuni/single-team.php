<?php get_header(); ?>
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Our Team</h1>
        <h6 class="display-6 text-white mb-3 animated slideInDown">
            <?php $job_value = get_post_meta(get_the_ID(), 'job', true);
            echo "<span class='box'>$job_value</span>";
            ?>
        </h6>
    </div>
</div>
</div>

<div class="d-flex">
    <?php if (have_posts()): ?>
        <?php while (have_posts()):
            the_post(); ?>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item text-center rounded overflow-hidden">
                    <div class="rounded-circle overflow-hidden m-4">
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid']); ?>
                        <?php else: ?>
                            <img class="img-fluid" src="<?php echo RESTORANT_ASSETS_URL; ?>img/team-1.jpg" alt="">
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
            </div>
            <div style="margin: 10px;"><?php the_content(); ?></div>
        <?php endwhile; ?>
    <?php else: ?>
        <?php _e('Sorry, no posts found', 'softuni'); ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>

</div>



<?php get_footer(); ?>