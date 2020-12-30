<?php
/*

   @package graffititheme

*/

if( ! is_active_sidebar( 'graffiti-sidebar' ) ) {
    return;
}

?>

<aside id="secondary" class="widget-area" role="complementary">

    <?php dynamic_sidebar('graffiti-sidebar'); ?>

</aside>


