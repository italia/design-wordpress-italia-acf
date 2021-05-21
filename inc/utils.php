<?php


function mid_ignore_sticky_posts($query){
	if ($query->is_posts_page &&  $query->is_main_query()){
		//$query->set('post__not_in', get_option('sticky_posts'));
		$query->set('ignore_sticky_posts', true);
	}

}
add_action('pre_get_posts', 'mid_ignore_sticky_posts');


/**
 * video post
 * @param null $post_id
 *
 * @return mixed|string
 */
function the_post_video($post_id=NULL) {
	global $post;
	$target_post = $post;
	if($post_id !== NULL)
		$target_post = get_post($post_id);

	$matches = null;
	if(preg_match('/<iframe(.*?)\\/?>(<\\/iframe>)?/s', $post->content, $matches)) {
		return $matches[0];
	}
	return ''; // return empty if no iframe found.
}


/**
 *
 */
function mid_slug_all_posts_link() {
	if ( 'page' == get_option( 'show_on_front' ) ) {
		if ( get_option( 'page_for_posts' ) ) {
			return  get_permalink( get_option( 'page_for_posts' ) ) ;
		} else {
			return home_url( '/?post_type=post' );
		}
	} else {
		return home_url( '/' );
	}
}

/**
 * //Custom pagination
 */
function mid_bootstrap_pagination()
{
    if (is_singular())
        return;
    global $wp_query;
    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;
    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);
    /** Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;
    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    echo '<nav class="w-100 pagination-wrapper justify-content-center" aria-label="Paginazione">' . "\n";
    echo '<ul class="pagination">' . "\n";
    /** Previous Post Link */
    if (get_previous_posts_link()){
        $prv_post = previous_posts( false );
        echo '<li  class="page-item"><a class="page-link" href="'.($prv_post).'"><svg class="icon icon-primary"><use xlink:href="'.get_template_directory_uri().'/assets/bootstrap-italia/svg/sprite.svg#it-chevron-left"></use></svg>
<span class="sr-only">Pagina precedente</span></a></li>';
    }

    /** Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="page-item active"' : ' class="page-item" ';
        $num = 1 == $paged ? " <span class=\"d-inline-block d-sm-none\">Pagina </span>1" : "1";
        printf('<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), $num);
        if (!in_array(2, $links))
            echo '<li class="page-item"><span class="page-link">...</span></li>' . "\n";
    }
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array)$links as $link) {
        $class = $paged == $link ?  ' class="page-item active"' : ' class="page-item" ';
        $aria = $paged == $link ?  ' aria-current="page" ' : ' ';
        $num = $paged == $link  ? " <span class=\"d-inline-block d-sm-none\">Pagina </span>".$link : $link;
        printf('<li%s><a class="page-link" %s href="%s">%s</a></li>' . "\n", $class, $aria, esc_url(get_pagenum_link($link)), $num);
    }
    /** Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links))
            echo '<li class="page-item"><span class="page-link">...</span></li>' . "\n";

        $class = $paged == $max ? ' class="page-item active"' : ' class="page-item" ';
        $num = $paged == $max  ? " <span class=\"d-inline-block d-sm-none\">Pagina </span>".$max : $max;
        printf('<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $num);
    }

    /** Next Post Link */
    if (get_next_posts_link()){
        $nxt_post = next_posts(0,false);
        echo '<li  class="page-item"><a class="page-link" href="'.($nxt_post).'"> <span class="sr-only">Pagina successiva</span><svg class="icon icon-primary"><use xlink:href="'.get_template_directory_uri().'/assets/bootstrap-italia/svg/sprite.svg#it-chevron-right"></use></svg>
</a></li>';
    }

    echo '</ul>' . "\n";
    echo '</nav>' . "\n";
    echo '<!--/.Pagination-->' . "\n";
}


if(!function_exists("mid_get_post_related")){
	function mid_get_post_related($limit){
		global $post;

		$categories = get_the_category($post->ID);
		$category_ids = array();
		if ($categories) {
			foreach ( $categories as $individual_category ) {
				$category_ids[] = $individual_category->term_id;
			}
		}

		$related = get_posts(
			array(
				'post_type' => "post",
				'category__or' => $category_ids,
				'numberposts'  => $limit,
				'post__not_in' => array( $post->ID )
			)
		);


		return $related;
	}
}