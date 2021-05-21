<div class="card no-after ">
	<div class="overlay-card">
		<a href="<?php the_permalink(); ?>">
			<?php
			if ( has_post_thumbnail()){
				the_post_thumbnail("card-medium",  array('class' => 'card-img-top image-height-auto'));
			}
			?>
		</a>
		<div class="overlay-card-content" style="cursor: pointer;" onclick="document.location.href = '<?php the_permalink(); ?>'">
			<h3><?php the_title(); ?></h3>
		</div>
	</div>
</div><?php
