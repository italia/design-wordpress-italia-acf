<?php
/**
 * ministero functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ministero
 */


/**
 * Breadcrumbs
 */
require get_template_directory() . '/inc/breadcrumb.php';

/**
 * Custom Post Type
 */
require get_template_directory() . '/inc/cpt.php';

/**
 * acf
 */
require get_template_directory() . '/inc/acf.php';

/**
 * utils
 */
require get_template_directory() . '/inc/utils.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets.php';



/**
 * Enqueue scripts and styles.
 */
function mid_assets() {
	$version = 0.1;

	wp_enqueue_style( 'bootstrap-italia-min', get_template_directory_uri() . "/assets/bootstrap-italia/css/bootstrap-italia.min.css");
	wp_enqueue_style( 'bootstrap-italia-map', get_template_directory_uri() . "/assets/bootstrap-italia/css/bootstrap-italia.min.css.map");
	wp_enqueue_style( 'general-style', get_template_directory_uri() . "/assets/css/main.css");
    wp_enqueue_style( 'theme-style', get_template_directory_uri() . "/style.css");


	wp_enqueue_script( 'boostrap-italia', get_template_directory_uri() . '/assets/bootstrap-italia/js/bootstrap-italia.bundle.min.js', array(), $version, true );
	wp_enqueue_script( 'modernizr-custom-touchevents-webp', get_template_directory_uri() . '/assets/js/vendors/modernizr-custom-touchevents-webp.js', array(), $version, true );
	wp_enqueue_script( 'general-javascript', get_template_directory_uri() . '/assets/js/main.js', array(), $version, true );
}
add_action( 'wp_enqueue_scripts', 'mid_assets' );

function mdi_add_editor_styles() {
	add_editor_style('assets/bootstrap-italia/css/bootstrap-italia.min.css');
}
add_action('init','mdi_add_editor_styles');


/**
 * Registro menu
 */
function mid_menus() {
	register_nav_menus(
		array(
			'slim-navigation' => __( 'Header Slim Menu' ),
			'primary-menu' => __( 'Primary Menu' ),
			'secondary-menu' => __( 'Secondary Menu' ),
			'footer-menu' => __( 'Footer Menu' )
		)
	);
}
add_theme_support( 'menus' );
add_action( 'init', 'mid_menus' );


add_theme_support( 'post-formats', array(  'image', 'video', 'status' ) );

/**
 * size tagli immagine
 */
add_theme_support( 'post-thumbnails' );

function mid_image_sizes() {
    add_image_size( 'card-medium', 480, 270, true );
	add_image_size( 'card-large', 480, 270, true );

	add_image_size( 'square', 800, 800, true );

}
add_action( 'init', 'mid_image_sizes' );

function mdi_get_menu_array($current_menu) {
	$array_menu = wp_get_nav_menu_items($current_menu);
	$menu = array();
	foreach ($array_menu as $m) {
		if (empty($m->menu_item_parent)) {
			$menu[$m->ID]['ID']      =   $m->ID;
			$menu[$m->ID]['title']       =   $m->title;
			$menu[$m->ID]['url']         =   $m->url;
			$menu[$m->ID]['classes']         =   $m->classes;
			$menu[$m->ID]['childrens']    =   array();
		}
	}
	$submenu = array();
	foreach ($array_menu as $m) {
		if ($m->menu_item_parent) {
			$submenu[$m->ID]['ID']       =   $m->ID;
			$submenu[$m->ID]['title']    =   $m->title;
			$submenu[$m->ID]['url']  =   $m->url;
			$submenu[$m->ID]['classes']  =   $m->classes;
			$menu[$m->menu_item_parent]['childrens'][$m->ID] = $submenu[$m->ID];
		}
	}
	return $menu;
}


/**
 *  Sidebars management
 */
if ( function_exists('register_sidebar') ) {

    register_sidebar(array(
        'name' => 'Post Sidebar',
        'id' => 'post-sidebar',
        'description' => 'Sidebar di dettaglio dei post',
        'before_widget' => '<div  id="%1$s"  class="card   rounded shadow mt-4 mb-3 pt-3 widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4  class="w-100 text-center">',
        'after_title' => '</h4>',
    ));


    register_sidebar(array(
        'name' => 'Page Sidebar',
        'id' => 'page-sidebar',
        'description' => 'Sidebar di dettaglio delle pagine',
        'before_widget' => '<nav  id="%1$s"  class="navbar it-navscroll-wrapper it-left-side widget %2$s">',
        'after_widget' => '</nav>',
        'before_title' => '<h3 class="w-100">',
        'after_title' => '</h3>',
    ));


    register_sidebar(array(
		'name' => 'Footer Sidebar',
		'id' => 'footer-sidebar',
		'description' => 'Sidebar del footer',
		'before_widget' => '<div  id="%1$s"  class="col-md-3 widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="text-uppercase">',
		'after_title' => '</h4>',
	));


}
