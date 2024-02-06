<?php get_header(); ?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">
            <?php the_title(); ?>
        </h1>
        <h7 class="display-7 text-white mb-3 animated slideInDown">
            <?php $food_type = get_post_meta(get_the_ID(), 'food_type', true);
            echo "<span class='box'>$food_type</span>";
            ?>
        </h7>
    </div>
</div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <?php if (have_posts()): ?>
            <?php while (have_posts()):
                the_post(); ?>
                <div>
                    <div class="col-lg-12">
                        <div class="d-flex align-items-center">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('square-400'); ?>
                            <?php else: ?>
                                <img class="flex-shrink-0 img-fluid rounded" src="<?php echo Restorant_ASSETS_URL; ?>/img/hero.png"
                                    style="width: 400px; height: 400px;">
                            <?php endif; ?>
                            <div class="w-100 d-flex flex-column text-start ps-4">
                                <h3 class="d-flex justify-content-between border-bottom pb-2">
                                    <span>
                                        <?php the_title(); ?>
                                    </span>
                                    <span class="text-primary">
                                        <?php $price_value = get_post_meta(get_the_ID(), 'price', true);
                                        echo "<span class='box'>$$price_value</span>";
                                        ?>
                                    </span>
                                </h3>
                                <small class="fst-italic">
                                    <?php the_content(); ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>