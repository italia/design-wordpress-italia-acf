<?php
global $post;
$related = mid_get_post_related(5);

if( $related ) {

	?>

    <h4 class="w-100">Altre notizie</h4>
	<?php
	foreach ($related as $post) {
		setup_postdata($post);
		get_template_part( 'template-parts/card/post' , get_post_format($post));
	}
	wp_reset_postdata();
	?>

    <a class="btn text-primary" href="<?php echo get_post_type_archive_link("post"); ?>">Vedi tutte le Notizie →</a>

	<?php
}
if (is_active_sidebar( 'post-sidebar' ) ) {
	dynamic_sidebar( 'post-sidebar' );
}