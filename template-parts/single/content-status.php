<?php get_template_part("template-parts/single/breadcrumb"); ?>

<div class="it-hero-wrapper it-overlay it-dark it-bottom-overlapping-content">
	<?php

	?>
	<!-- - img-->
	<div class="img-responsive-wrapper">
		<div class="img-responsive">
			<div class="img-wrapper primary-bg">
				<?php
				if ( has_post_thumbnail()) {
					$image = get_the_post_thumbnail( $post, "full" );
					echo $image;
				}
				?>
			</div>
		</div>
	</div>
	<?php

	?>
	<!-- - texts-->
	<div class="container">
		<div class="row">


			<div class="col-12">
				<div class="it-hero-text-wrapper it-overlay it-dark  pt-lg-5 mt-lg-5 mt-0 pt-0">
					<span class="text-white it-category"><?php the_category(","); ?></span>
					<h1 class="text-white"><?php the_title(); ?></h1>
					<p class="text-white d-none d-lg-block">
						<?php echo get_the_excerpt(); ?>
					</p>

				</div>
			</div>
		</div>
	</div>


</div>

<article class="container my-1">

	<div class="row">
		<div class="col-12 col-lg-2"></div>
		<div class="col-12 col-lg-8">
			<!--start card-->
			<div class="card-wrapper card-space">
				<div class="card card-bg card-big border-bottom-card">
					<div class="etichetta">
						<svg class="icon">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/bootstrap-italia/svg/sprite.svg#it-calendar"></use>
						</svg>
						<span><?php the_date(); ?></span>
					</div>
					<div class="p-4 p-lg-5 mt-5">
						<div class="text-primary">
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
		<div class="col-12 col-lg-2"></div>
	</div>
</article>

<div class="container">
    <div class="row">
        <div class="col-12">
        <?php get_template_part("template-parts/single/related", "status"); ?>
        </div>
    </div>
</div>