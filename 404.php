<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package gutenberg-starter-theme
 */

get_header(); ?>
    <section id="content" role="main" class="container">

        <div class="container">
            <div class="row">

                <section class="jumbotron text-center w-100">
                    <div class="container">
                        <h1 class="jumbotron-heading">404</h1>
                        <p class="lead text-muted">Ops, qualcosa è andato storto...</p>
                        <p>
                            <a href="<?php echo home_url(); ?>" class="btn btn-primary my-2">Vai alla Home</a>
                            <a href="javascript: history.back();" class="btn btn-secondary my-2">Torna indietro</a>
                        </p>
                    </div>
                </section>

            </div>
        </div>
    </section>

<?php get_footer();
