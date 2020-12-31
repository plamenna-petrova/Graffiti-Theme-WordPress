<?php
/*
   This is the template header

   @package graffititheme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php bloginfo('name');
        wp_title(); ?></title>
    <meta name="description" content="<?php bloginfo('description') ?>">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if (is_singular() && pings_open(get_queried_object())): ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="graffiti-sidebar sidebar-closed">
    <div class="graffiti-sidebar-container">

        <a class="js-toggleSidebar sidebar-close">
            <span class="sunset-icon sunset-close"></span>
        </a>

        <div class="sidebar-scroll">
            <?php get_sidebar(); ?>
        </div><!-- .sidebar-scroll -->

    </div><!-- .graffiti-sidebar-container -->
</div><!-- .graffiti-sidebar -->

<div class="graffiti-overlay js-toggleSidebar"></div>

<div class="container-fluid">

    <div class="row">
        <header class="header-container background-image text-left"
                style="background-image: url(<?php header_image(); ?>);">

            <a class="js-toggleSidebar sidebar-open">
                <span class="sunset-icon sunset-menu"></span>
            </a>

            <div class="header-content table">
                <div class="table-cell">
                    <h1 class="site-title"><?php bloginfo('name'); ?></h1>
                    <h2 class="site-description"><?php bloginfo('description'); ?></h2>
                </div>
            </div><!-- .header-content -->

            <div class="nav-container d-none d-sm-block">

                <nav class="navbar navbar-light navbar-graffiti">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'nav navbar-nav',
                        'walker' => new Graffiti_Walker_Nav_Primary()
                    ));
                    ?>
                </nav>

            </div><!-- .nav-container -->

        </header><!-- .header-container -->

    </div><!-- .row -->

</div><!-- .container -->


