<?php
global $post;
?>
    <div class="card card-teaser align-self-stretch rounded shadow mb-4">
        <div class="card-body">
            <h5 class="card-title"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h5>
            <div class="card-text mb-5">
                <div class="responsive-embed mb-3">

                <?php if ( has_post_thumbnail()){
                    the_post_thumbnail("card-medium",  array('class' => 'w-100'));
                }else{
	                $embedded = get_media_embedded_in_content(apply_filters("the_content", $post->post_content), array(  'video', 'object', 'embed', 'iframe' ));
	                if($embedded){
		                ?>
                                <?php echo $embedded[0]; ?>
                <?php
                    }
                }
                ?>
                </div>

                <p class="card-excerpt"><?php echo get_the_excerpt(); ?></p>
            </div>
            <a class="read-more" href="<?php the_permalink(); ?>">
                <span class="text"><?php _e("Read more"); ?></span>
                <svg class="icon">
                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/bootstrap-italia/svg/sprite.svg#it-arrow-right"></use>
                </svg>
            </a>
        </div>
    </div>

