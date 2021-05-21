<?php
global $post;

?>
	<div class="card-wrapper card-space">
		<div class="card card-bg">
			<div class="card-body">
				<h5 class="card-title"><?php the_title(); ?></h5>
				<p class="card-text"><?php echo get_the_excerpt() ?></p>
				<a class="read-more" href="<?php the_permalink(); ?>">
					<span class="text"><?php _e("Read more"); ?></span>
					<svg class="icon">
						<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/bootstrap-italia/svg/sprite.svg#it-arrow-right"></use>
					</svg>
				</a>
			</div>
		</div>
	</div>

