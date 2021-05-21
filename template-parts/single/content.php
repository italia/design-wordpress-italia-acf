<?php
get_template_part("template-parts/single/breadcrumb");
?>

<article class="container my-1">
	<div class="row">
		<div class="col-12 col-lg-8">
			<!--start card-->
			<div class="card-wrapper card-space">
				<div class="card card-bg card-big border-bottom-card">
					<div class="flag-icon"></div>
					<div class="etichetta">
						<svg class="icon">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/bootstrap-italia/svg/sprite.svg#it-calendar"></use>
						</svg>
						<span><?php the_date(); ?></span>
					</div>
					<div class="card-body">
						<h5 class="card-title"><?php the_title(); ?></h5>
						<div class="card-text">
							<?php the_content(); ?>
						</div>

						<?php
						$catlist = get_the_category_list( ", " );
						if($catlist) {
							?>
							<svg class="icon">
								<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/bootstrap-italia/svg/sprite.svg#it-folder"></use>
							</svg>
							<?php echo $catlist;
						}
						?>

					</div>
				</div>
			</div>
			<!--end card-->
		</div>
		<div class="col-12 col-lg-4 sidebar">
			<?php get_sidebar("post"); ?>
		</div>
	</div>
</article>
