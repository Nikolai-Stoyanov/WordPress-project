<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <?php wp_head(); ?>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <title>
        <?php wp_title(); ?>
    </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="<?php echo RESTORANT_ASSETS_URL; ?>/img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body <?php body_class(); ?>>
    <div class="container-xxl bg-white p-0">
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="<?php echo esc_url(get_home_url()); ?>" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <?php
                    if (has_nav_menu('header-menu')) {

                        wp_nav_menu($args = array(
                            'menu'            => "navbarCollapse", // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
                            'menu_class'      => "navbar-nav ms-auto py-0 pe-4", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
                            'menu_id'         => "navbarCollapse", // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
                            'container'       => "div", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
                            'container_class' => "collapse navbar-collapse", // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
                            'container_id'    => "navbarCollapse", // (string) The ID that is applied to the container.
                            'theme_location'  => "header-menu", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
                        ));
                    }
                ?>
            </nav>