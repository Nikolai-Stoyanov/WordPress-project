<?php get_header(); ?>

    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">
                <?php the_archive_title(); ?>
            </h1>
        </div>
    </div>
</div>

<?php
$restorant_archive_arg = array(
    "post_type" => "post",
    "post_status" => "publish",
    "posts_per_page" => 2,
    "paged"=> get_query_var("paged"),
);

$restorant_archive_query = new WP_Query($restorant_archive_arg);
?>

<?php if ($restorant_archive_query->have_posts()): ?>
    <?php while ($restorant_archive_query->have_posts()):
        $restorant_archive_query->the_post(); ?>
        <div <?php post_class("container-xxl py-5 wow fadeInUp") ?> data-wow-delay="0.1s">
            <div class="testimonial-item  border rounded p-4">
                <div class="d-flex align-items-center">
                    <h3 class="mb-1">
                        <?php the_title(); ?>
                    </h3>
                </div>
                <div class="d-flex align-items-center">
                    <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail(); ?>
                    <?php else: ?>
                        <img class="img-fluid flex-shrink-0 rounded-circle"
                            src="<?php echo RESTORANT_ASSETS_URL; ?>/img/testimonial-4.jpg"
                            style="width: 100px; height: 100px;">
                    <?php endif; ?>
                    <div>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>

    <?php endwhile; ?>
<?php endif; ?>

<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>