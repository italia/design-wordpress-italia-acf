<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ministero
 */

?>

<footer class="it-footer">
    <div class="it-footer-main">
        <div class="container">
            <section>
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="it-brand-wrapper">
                            <a href="<?php echo home_url(); ?>">
                                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-repubblica-italiana.svg" alt="Emblema della Repubblica Italiana">
                                <img class="icon" src="<?php echo get_field('immagine_logo', 'option'); ?>" alt="<?php bloginfo("name"); ?>" style="width:120px">
                                <div class="it-brand-text">
                                    <h2><?php echo get_field('intestazione_footer_titolo', 'option'); ?></h2>
                                    <h3 class="d-none d-md-block"><?php echo get_field('intestazione_footer_sottotitolo', 'option'); ?></h3>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mt-4">
                <div class="row">
	                <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                </div>
            </section>


            <section class="mt-4">
                <div class="row">
                    <div class="col-12">
                        <h4 class="text-uppercase">Contatti</h4>
                        <div class="row">
                            <div class="col-12">
                                <h5 class="h6 mb-3">Ministro per l’Innovazione tecnologica e la digitalizzazione</h5>
                                <div class="row bt-alpha-2 ">

                                    <div class="col-xl-4">
                                        <div class="link-list-wrapper">
                                            <ul class="pt-2 link-list clearfix">
                                                <li class="py-2">
                                                    <svg class="mr-2 align-top icon icon-sm icon-white">
                                                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/bootstrap-italia/svg/sprite.svg#it-pa"></use>
                                                    </svg>
                                                    <p class="ml-1 d-inline-block">
                                                        Indirizzo
                                                        <br/>
                                                        <a class="list-item" href="<?php echo get_field('contatti_indirizzo_url_mappa', 'option'); ?>">
	                                                        <?php echo get_field('contatti_indirizzo_via', 'option'); ?><br/><?php echo get_field('contatti_indirizzo_cap', 'option'); ?> <?php echo get_field('contatti_indirizzo_citta', 'option'); ?>
                                                        </a>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="link-list-wrapper">
                                            <ul class="pt-2 link-list clearfix">
                                                <li class="py-2">
                                                    <svg class="mr-2 align-top icon icon-sm icon-white">
                                                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/bootstrap-italia/svg/sprite.svg#it-mail"></use>
                                                    </svg>
                                                    <p class="ml-1 d-inline-block">
                                                        Posta Elettronica
                                                        <br/>
                                                        <a class="list-item" href="mailto:<?php echo get_field('contatti_posta_elettronica', 'option'); ?>">
	                                                        <?php echo get_field('contatti_posta_elettronica', 'option'); ?>
                                                        </a>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="link-list-wrapper">
                                            <ul class="pt-2 link-list clearfix">
                                                <li class="py-2">
                                                    <svg class="mr-2 align-top icon icon-sm icon-white">
                                                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/bootstrap-italia/svg/sprite.svg#it-mail"></use>
                                                    </svg>
                                                    <p class="ml-1 d-inline-block">
                                                        Contatti Media
                                                        <br/>
                                                        <a class="list-item" href="mailto:<?php echo get_field('contatti_contatti_media', 'option'); ?>">
	                                                        <?php echo get_field('contatti_contatti_media', 'option'); ?>
                                                        </a>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="mt-4">
                <div class="row">
                    <div class="col">
                        <ul class="list-inline text-center social">
                        <?php $socials = get_field('social', 'option');
	                    if(is_array($socials['element']) && !empty($socials['element'])) :
		                    foreach ($socials['element'] as $social) : ?>
                                <li class="list-inline-item">
                                    <a href="<?php echo $social['url']; ?>" class="p-2 text-white" aria-label="<?php echo ucfirst($social['nome']); ?>" target="_blank" rel="noopener noreferrer">
                                        <svg class="icon icon-lg icon-white align-top">
                                            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/bootstrap-italia/svg/sprite.svg#it-<?php echo strtolower($social['nome']); ?>"></use>
                                        </svg>
                                        <span class="sr-only"><?php echo ucfirst($social['nome']); ?></span>
                                    </a>
                                </li>
		                    <?php
		                    endforeach;
	                    endif;?>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="it-footer-small-prints clearfix pt-2">
        <section class="container border-cyan border-top">
	        <?php
	        if ( ( $locations = get_nav_menu_locations() ) && isset( $locations['footer-menu'] ) ) : ?>
                <ul class="it-footer-small-prints-list list-inline mb-0 d-flex flex-column flex-md-row">
			        <?php $menu = get_term( $locations['footer-menu'], 'nav_menu' );
			        $footer_menu = mdi_get_menu_array($menu->term_id);

			        foreach ($footer_menu as $menu_item) : ?>
                        <li class="list-inline-item">
                            <a class="list-item font-weight-semibold" href="<?php echo $menu_item['url']; ?>" title="<?php echo esc_attr($menu_item['title']); ?>"><?php echo $menu_item['title']; ?></a>
                        </li>
			        <?php endforeach; ?>
                </ul>
	        <?php endif;?>
        </section>
    </div>
</footer>

<script>window.__PUBLIC_PATH__ = '<?php echo get_template_directory_uri(); ?>/assets/bootstrap-italia/fonts'</script>
<?php wp_footer(); ?>

</body>
</html>
