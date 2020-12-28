<?php
/*
    @package graffititheme
*/
get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php if (is_paged()): ?>

                <form action="post">
                    <div class="container text-center container-load-previous">
                        <a class="btn-graffiti-load graffiti-load-more" data-prev="1"
                           data-page="<?= graffiti_check_paged(1); ?>" data-url="<?= admin_url('admin-ajax.php'); ?>">
                            <span class="sunset-icon sunset-loading"></span>
                            <span class="text">Load Previous</span>
                        </a>
                    </div><!-- .container -->
                </form>

            <?php endif; ?>

            <div class="container graffiti-posts-container px-5">

                <?php
                if (have_posts()):

                    echo '<div class="page-limit" data-page="' . get_site_url() . '/' . graffiti_check_paged() . '">';

                    while (have_posts()): the_post();

                        // $class = 'reveal';
                        // set_query_var('post-class', $class);

                        get_template_part('template-parts/content', get_post_format());
                    endwhile;

                    echo '</div>';

                endif;
                ?>

            </div><!-- .container -->

            <form action="post">
                <div class="container text-center">
                    <a class="btn-graffiti-load graffiti-load-more" data-page="<?= graffiti_check_paged(1); ?>"
                       data-url="<?= admin_url('admin-ajax.php'); ?>">
                        <span class="sunset-icon sunset-loading"></span>
                        <span class="text">Load More</span>
                    </a>
                </div><!-- .container -->
            </form>

        </main>
    </div><!-- #primary -->

<?php get_footer(); ?>