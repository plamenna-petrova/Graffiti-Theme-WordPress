<?php
/*

   @package graffititheme

*/

if (!is_active_sidebar('graffiti-sidebar')) {
    return;
}

?>

<aside id="secondary" class="widget-area" role="complementary">

    <div class="d-xs-block d-sm-none d-lg-none d-xl-none navbar-collapse">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'navbar-nav mr-auto mt-2 mt-lg-0',
            'walker' => new Graffiti_Walker_Nav_Primary()
        ) );
        ?>
    </div>

    <?php dynamic_sidebar('graffiti-sidebar'); ?>

</aside>


