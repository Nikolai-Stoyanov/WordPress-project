<div class="col-lg-6">
    <a href="<?php the_permalink(); ?>" style="cursor:pointer;">
        <div class="d-flex align-items-center">
            <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('square-80'); ?>
            <?php else: ?>
                <img class="flex-shrink-0 img-fluid rounded"
                    src="<?php echo RESTORANT_ASSETS_URL; ?>/img/menu-2.jpg" style="width: 80px;">
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