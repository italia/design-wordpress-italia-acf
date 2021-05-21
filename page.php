<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gutenberg-starter-theme
 */

get_header(); ?>

<?php
if ( have_posts() ) :

    /* Start the Loop */
    while ( have_posts() ) : the_post();

        get_template_part("template-parts/single/breadcrumb");
        ?>
        <div class="container my-4">
            <div class="row">
                <div class="col col-lg-8">
                    <div class="mx-md-3">
                        <h1><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="col-12 col-lg-4 sidebar">
                    <?php get_sidebar("page"); ?>
                </div>
            </div>
        </div>
    <?php
    endwhile;

    the_posts_navigation();

else :

    get_template_part( 'template-parts/content', 'none' );

endif; ?>

<?php
get_footer();
