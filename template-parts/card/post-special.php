<?php
global $post;
?>
<!--start card-->
<div class="card-wrapper w-100">
	<a class="card card-bg card-big border-bottom-card card-img no-after special-card" href="<?php the_permalink(); ?>">
		<div class="img-responsive-wrapper">
			<div class="img-responsive">
				<figure class="img-wrapper">
					<?php
					if ( has_post_thumbnail()){
						the_post_thumbnail("card-medium",  array('class' => ''));
					}
					?>
				</figure>
			</div>
		</div>
		<div class="card-body">
			<div class="head-tags"><span class="data"><?php echo get_the_date(); ?></span>
			</div>
			<h5 class="card-title"><?php the_title(); ?></h5>
		</div>
	</a>
</div>
<!--end card-->