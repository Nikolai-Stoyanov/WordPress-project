
<?php
$restorant_team_arg = array(
    "post_type" => "team",
    "post_status" => "publish",
    "posts_per_page" => 4,
    "paged" => get_query_var("paged"),
);

$restorant_team_query = new WP_Query($restorant_team_arg);
?>

<div class="container-xxl pt-5 pb-3">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Team Members</h5>
            <h1 class="mb-5">Our Master Chefs</h1>
        </div>
        <div class="row g-4">
            <?php if ($restorant_team_query->have_posts()): ?>
                <?php while ($restorant_team_query->have_posts()):
                    $restorant_team_query->the_post(); ?>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a href="<?php the_permalink(); ?>" style="cursor:pointer;">
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