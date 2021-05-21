<?php
global $post;
$related = mid_get_post_related(6);

if($related) {
	?>
	<div class="it-carousel-wrapper it-carousel-landscape-abstract-three-cols">
		<div class="it-header-block">
			<div class="catitle">
				<h4 class="w-100 text-center">Altre notizie</h4>
			</div>
		</div>
		<div class="it-carousel-all owl-carousel it-card-bg">
			<?php
			foreach ($related as $post) {
				?>
			<div class="it-single-slide-wrapper">
				<div class="card-wrapper card-space">
				<?php
				setup_postdata($post);
				get_template_part( 'template-parts/card/post' , get_post_format($post));
				?>
				</div>
			</div>

				<?php

			}
			wp_reset_postdata();
			?>
		</div>
	</div>

	<a class="btn text-primary w-100 text-right" href="<?php echo get_post_type_archive_link("post"); ?>">Vedi tutte le Notizie →</a>

	<?php
}