<?php

/*

@package graffititheme

	-- Audio Post Format
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'graffiti-format-audio' ); ?>>
    <header class="entry-header">

        <?php the_title('<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>');?>

        <div class="entry-meta">
            <?php echo graffiti_posted_meta(); ?>
        </div>

    </header>

    <div class="entry-content">

        <?php  echo graffiti_get_embedded_media( array('audio', 'iframe' ) );
            //the_content();
        ?>

    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php echo graffiti_posted_footer(); ?>
    </footer>

</article>