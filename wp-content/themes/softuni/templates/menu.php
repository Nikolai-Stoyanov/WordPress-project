<?php // Template Name: menu ?>
<?php get_header(); ?>

    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">
                <?php _e('Food Menu', 'softuni'); ?>
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="<?php echo esc_url(get_home_url()); ?>">
                            <?php _e('Home', 'softuni'); ?>
                        </a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">
                        <?php _e('Menu', 'softuni'); ?>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>


<?php get_template_part( 'partials/content', 'menu', array("load_more_button_visible" => 'true') ); ?>

<?php get_footer(); ?>