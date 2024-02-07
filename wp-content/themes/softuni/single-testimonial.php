<?php get_header(); ?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Our Clients Say!!!</h1>
    </div>
</div>
</div>

<div class="container-xxl py-5 wow fadeInDown" data-wow-delay="0.5s">
    <div class="container">
        <div >
            <?php if (have_posts()): ?>
                <?php while (have_posts()):
                    the_post(); ?>
                    <div>
                        <h5 class="mb-1" style='text-align: center'>
                            <?php the_title(); ?>
                        </h5>
                        <div class="d-flex align-items-center">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('square-400'); ?>
                            <?php else: ?>
                                <img class="img-fluid flex-shrink-0 rounded-circle"
                                    src="<?php echo Restorant_ASSETS_URL; ?>/img/testimonial-1.jpg"
                                    style="width: 400px; height: 400px;">
                            <?php endif; ?>
                            <div class="ps-3">
                                <p>
                                    <?php the_content(); ?>
                                </p>
                                <strong>Profession: </strong>
                                <small>
                                    <?php $profession_value = get_post_meta(get_the_ID(), 'profession', true);
                                    echo "<span class='box'>$profession_value</span>";
                                    ?>
                                </small>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
    <?php get_footer(); ?>