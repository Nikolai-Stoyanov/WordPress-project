<?php // Template Name: about ?>
<?php get_header(); ?>
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown"><?php _e('About us', 'softuni'); ?></h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="<?php echo esc_url(get_home_url()); ?>"><?php _e('Home', 'softuni'); ?></a></li>
                <li class="breadcrumb-item text-white active" aria-current="page"><?php _e('About', 'softuni'); ?></li>
            </ol>
        </nav>
    </div>
</div>
</div>

<?php get_template_part( 'partials/content', 'about'); ?>
<?php get_template_part( 'partials/content', 'team'); ?>

<?php get_footer(); ?>