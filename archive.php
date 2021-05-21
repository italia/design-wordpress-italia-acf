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

get_header();

$queried_object = get_queried_object();

?>


    <section id="content" role="main" class="container">

    <div class="container">
    <div class="row">

        <?php
        get_template_part("template-parts/single/breadcrumb");
        ?>


        <div class="container it-primary">
            <div class="jumbotron">
                <h1 class="text-primary text-center">
				    <?php
				    if(is_post_type_archive()){
					    echo post_type_archive_title();
				    }else{
					    echo single_term_title();
				    }
				    ?>
                </h1>
			    <?php

			    if(!is_post_type_archive())
				    the_archive_description( '<div class="taxonomy-description">', '</div>' );
			    ?>
            </div>
        </div>

        <?php



        if ( have_posts() ) {
?>





            <?php
            // Load posts loop.
            while ( have_posts() ) {
                the_post();
                echo '<div class="col-12 col-md-4 d-flex mt-5">';
                get_template_part( 'template-parts/card/post', get_post_type() );
                echo "</div>";
            }
      }else{
	        get_template_part( 'template-parts/none' );

        } ?>


    </div>

    <div class="row">
        <?php mid_bootstrap_pagination(); ?>
    </div>
    </div>
    </section>


<?php get_footer();
