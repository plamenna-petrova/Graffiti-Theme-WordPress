<?php

/*

@package graffititheme

	-- Aside Post Format
*/

//$class = get_query_var('post-class');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'graffiti-format-aside' ) ); ?>>

    <div class="aside-container">

        <div class="row">

            <div class="col-xs-12 col-sm-3 col-md-2 text-center">

                <?php if( graffiti_get_attachment() ): ?>

                    <div class="aside-featured background-image" style="background-image: url(<?php echo graffiti_get_attachment(); ?>);"></div>

                <?php endif; ?>

            </div><!-- .col-md-2 -->

            <div class="col-xs-12 col-sm-9 col-md-10">

                <header class="entry-header">

                    <div class="entry-meta">
                        <?php echo graffiti_posted_meta(); ?>
                    </div>

                </header>

                <div class="entry-content">

                    <div class="entry-excerpt">
                        <?php the_content(); ?>
                    </div>

                </div><!-- .entry-content -->

            </div><!-- .col-md-10 -->

        </div><!-- .row -->

        <footer class="entry-footer">

            <div class="row">

                <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2">

                    <?php echo graffiti_posted_footer(); ?>

                </div><!-- .col-md-10 -->

            </div><!-- .row -->

        </footer>

    </div><!-- .aside-container -->

</article>