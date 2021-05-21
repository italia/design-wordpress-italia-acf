<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ministero
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo get_bloginfo('name'); ?> <?php wp_title(); ?></title>

    <?php wp_head(); ?>

    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicons/favicon.ico"/>
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicons/manifest.json">
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="it-header-wrapper it-header-sticky">
        <div class="it-header-slim-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="it-header-slim-wrapper-content">
                            <a class="d-none d-lg-block navbar-brand" href="<?php echo get_field('intestazione_link_top_left_url', 'option'); ?>" target="_blank" rel="noopener noreferrer"><?php echo get_field('intestazione_link_top_left_titolo', 'option'); ?></a>
                            <div class="nav-mobile">
                                <nav>
                                    <a class="it-opener d-lg-none" data-toggle="collapse" href="#slim-navigation" role="button" aria-expanded="false" aria-controls="slim-navigation">
                                        <span>Altre informazioni</span>
                                        <svg class="icon">
                                            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/bootstrap-italia/svg/sprite.svg#it-expand"></use>
                                        </svg>
                                    </a>
                                    <div class="link-list-wrapper collapse" id="slim-navigation">
                                        <ul class="link-list">
                                        <?php if ( ($locations = get_nav_menu_locations()) && isset($locations['slim-navigation']) ) {
	                                        $menu = get_term( $locations['slim-navigation'], 'nav_menu' );
	                                        $menu_items = wp_get_nav_menu_items($menu->term_id);

                                            $i = 0;
	                                        foreach( $menu_items as $menu_item ) {
                                                $class = $i == 0 ? ' class="d-lg-none"' : '';
                                                echo '<li'.$class.'><a href="'.$menu_item->url.'" target="_blank" rel="noopener noreferrer" title="'.esc_attr($menu_item->title).'">'.$menu_item->title.'</a></li>';
                                                $i++;
                                            }
                                        } ?>
                                        </ul>
                                        <?php ?>
                                    </div>
                                </nav>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="it-nav-wrapper">
            <div class="it-header-center-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="it-header-center-content-wrapper">
                                <div class="it-brand-wrapper">
                                    <a href="<?php echo home_url(); ?>">
                                        <img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-repubblica-italiana.svg" alt="Emblema della Repubblica Italiana">
                                        <img class="icon innovation-main-icon" src="<?php echo get_field('immagine_logo', 'option'); ?>" alt="<?php bloginfo("name"); ?>">
                                        <div class="it-brand-text pr-0">
                                            <h2 class="innovation-main-title">
	                                            <?php echo get_field('intestazione_titolo', 'option'); ?>
                                            </h2>
                                        </div>
                                    </a>
                                </div>
                                <div class="it-right-zone">
                                    <div class="it-socials d-none d-md-flex">
	                                    <?php $socials = get_field('social', 'option');
	                                    if(is_array($socials['element']) && !empty($socials['element'])) :
		                                    echo '<span>Seguici su</span>';
	                                        echo '<ul>';
	                                        foreach ($socials['element'] as $social) : ?>
                                                <li class="list-inline-item">
                                                    <a href="<?php echo $social['url']; ?>" aria-label="<?php echo ucfirst($social['nome']); ?>" target="_blank" rel="noopener noreferrer">
                                                        <svg class="icon">
                                                            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/bootstrap-italia/svg/sprite.svg#it-<?php echo strtolower($social['nome']); ?>"></use>
                                                        </svg>
                                                        <span class="sr-only"><?php echo ucfirst($social['nome']); ?></span>
                                                    </a>
                                                </li>
                                                <?php
                                            endforeach;
	                                        echo '</ul>';
                                        endif;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="it-header-navbar-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <nav class="navbar navbar-expand-lg has-megamenu">
                                <button class="custom-navbar-toggler" type="button" aria-controls="main-navigation" aria-expanded="false" aria-label="Toggle navigation" data-target="#main-navigation">
                                    <svg class="icon">
                                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/bootstrap-italia/svg/sprite.svg#it-burger"></use>
                                    </svg>
                                </button>
                                <div class="navbar-collapsable" id="main-navigation">
                                    <div class="overlay"></div>
                                    <div class="close-div sr-only">
                                        <button class="btn close-menu" type="button">
                                            <svg class="icon">
                                                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/bootstrap-italia/svg/sprite.svg#it-close"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="menu-wrapper">
	                                    <?php
	                                    get_template_part("template-parts/common/primary-menu");
	                                    get_template_part("template-parts/common/secondary-menu");
	                                    ?>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
