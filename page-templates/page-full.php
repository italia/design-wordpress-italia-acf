<?php
/* Template Name: Page Full  */

get_header(); ?>

<?php
if ( have_posts() ) :

	/* Start the Loop */
	while ( have_posts() ) : the_post();

		get_template_part("template-parts/single/breadcrumb");
		?>
		<div class="container my-4">
			<div class="row">
				<div class="col col-12">
					<div class="mx-md-3">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	<?php
	endwhile;
endif; ?>

<?php
get_footer();
