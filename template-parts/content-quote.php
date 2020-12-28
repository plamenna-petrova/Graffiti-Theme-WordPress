<?php

/*

@package graffititheme

	-- Quote Post Format
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'graffiti-format-quote' ); ?>>
    <header class="entry-header text-center">

        <div class="row">
            <div class="col-sm-10 col-md-8 offset-md-2 offset-md-1">
                <h1 class="quote-content"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo get_the_content(); ?></a></h1>
                <?php the_title('<h2 class="quote-author">- ',' -</h2>');?>
            </div><!-- .col-md-8 -->
        </div><!-- .row -->
    </header>

    <footer class="entry-footer">
        <?php echo graffiti_posted_footer(); ?>
    </footer>

</article>
