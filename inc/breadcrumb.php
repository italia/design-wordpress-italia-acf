<?php

/**
 * Retrieve category parents.
 *
 * @param int $id Category ID.
 * @param array $visited Optional. Already linked to categories to prevent duplicates.
 * @return string|WP_Error A list of category parents on success, WP_Error on failure.
 */
function custom_get_category_parents( $id, $visited = array() ) {
    $chain = '';
    $parent = get_term( $id, 'category' );
    $sep = "<span class=\"separator\">></span>";

    if ( is_wp_error( $parent ) )
        return $parent;

    $name = $parent->name;

    if ( $parent->parent && ( $parent->parent != $parent->term_id ) && !in_array( $parent->parent, $visited ) ) {
        $visited[] = $parent->parent;
        $chain .= custom_get_category_parents( $parent->parent, $visited );
    }

    $chain .= '<li class="breadcrumb-item"><a href="' . esc_url( get_category_link( $parent->term_id ) ) . '">' . $name. '</a>' . $sep. '</li>';

    return $chain;
}


/**
 * Retrieve taxonomy parents.
 *
 * @param int $id TAX ID.
 * @param array $visited Optional. Already linked to categories to prevent duplicates.
 * @return string|WP_Error A list of category parents on success, WP_Error on failure.
 */
function custom_get_taxonomy_parents($tax, $id, $visited = array() ) {
	$chain = '';
	$parent = get_term( $id, $tax );
	$sep = "<span class=\"separator\">></span>";

	if ( is_wp_error( $parent ) )
		return $parent;

	$name = $parent->name;

	if ( $parent->parent && ( $parent->parent != $parent->term_id ) && !in_array( $parent->parent, $visited ) ) {
		$visited[] = $parent->parent;
		$chain .= custom_get_taxonomy_parents($tax, $parent->parent, $visited );
	}

	$chain .= '<li class="breadcrumb-item"><a href="' . esc_url( get_term_link( $parent->term_id, $tax ) ) . '">' . $name. '</a>' . $sep. '</li>';

	return $chain;
}


/**
 * Display the breadcrumb automaticaly
 * @param  String $custom_home_icon  [OPTIONAL] Insert html tag (like Fontawesome <i class="fa fa-xx"></li>)
 * @param  Array $custom_post_types [OPTIONAL] Prevent custom post types with hierarchical structure
 */
function mid_bootstrap_breadcrumb($custom_home_icon = false, $custom_post_types = false) {

    global $post;
    $sep = "<span class=\"separator\">></span>";
    $html = '<ol class="breadcrumb">';

    if ( (is_front_page()) || (is_home()) ) {
        $html .= '<li class="breadcrumb-item active">Home/li>';
    }

    else {
        $html .= '<li class="breadcrumb-item"><a href="'.esc_url(home_url('/')).'">Home</a>'.$sep.'</li>';

        if ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $categories = get_the_category($parent->ID);

            if ( $categories[0] ) {
                $html .= custom_get_category_parents($categories[0]);
            }

            $html .= '<li class="breadcrumb-item"><a href="' . esc_url( get_permalink( $parent ) ) . '">' . $parent->post_title . '</a>'.$sep.'</li>';
            $html .= '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
        }

        elseif ( is_category() ) {
            $category = get_category( get_query_var( 'cat' ) );

            if ( $category->parent != 0 ) {
                $html .= custom_get_category_parents( $category->parent );
            }

            $html .= '<li class="breadcrumb-item active">' . single_cat_title( '', false ) . '</li>';
        }

        elseif ( is_page() && !is_front_page() ) {
            $parent_id = $post->post_parent;
            $parent_pages = array();

            while ( $parent_id ) {
                $page = get_page($parent_id);
                $parent_pages[] = $page;
                $parent_id = $page->post_parent;
            }

            $parent_pages = array_reverse( $parent_pages );

            if ( !empty( $parent_pages ) ) {
                foreach ( $parent_pages as $parent ) {
                    $html .= '<li class="breadcrumb-item"><a href="' . esc_url( get_permalink( $parent->ID ) ) . '">' . get_the_title( $parent->ID ) . '</a>'.$sep.'</li>';
                }
            }

            $html .= '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
        }

        elseif ( is_singular( 'post' ) ) {
            $categories = get_the_category();

            if ( $categories[0] ) {
                $html .= custom_get_category_parents($categories[0]);
            }

            $html .= '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
        }elseif ( is_singular( 'amm-trasparente' ) ) {

	        $options=get_option( 'wpgov_at');
	        if($options['page_id']){
		        $page = get_post($options['page_id']);
		        $html .= '<li class="breadcrumb-item"><a href="'.get_permalink($page).'">' . $page->post_title . '</a>'.$sep.'</li>';

	        }

			$tipologie = wp_get_post_terms($post->ID, "tipologie");

	        if ( $tipologie[0] ) {
		        $html .= custom_get_taxonomy_parents("tipologie", $tipologie[0]);
	        }

	        $html .= '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
        }
        elseif ( is_singular(  ) ) {
			$ptype = get_post_type();
	        $post_type_obj = get_post_type_object( $ptype );


	        $html .= '<li class="breadcrumb-item"><a href="' . esc_url( get_post_type_archive_link($ptype) ) . '">' . $post_type_obj->labels->name. '</a>' . $sep. '</li>';

	        $html .= '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
        }

        elseif ( is_tag() ) {
            $html .= '<li class="breadcrumb-item active">' . single_tag_title( '', false ) . '</li>';
        }

        elseif ( is_day() ) {
            $html .= '<li class="breadcrumb-item"><a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . get_the_time( 'Y' ) . '</a></li>';
            $html .= '<li class="breadcrumb-item"><a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '">' . get_the_time( 'm' ) . '</a></li>';
            $html .= '<li class="breadcrumb-item active">' . get_the_time('d') . '</li>';
        }

        elseif ( is_month() ) {
            $html .= '<li class="breadcrumb-item"><a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . get_the_time( 'Y' ) . '</a></li>';
            $html .= '<li class="breadcrumb-item active">' . get_the_time( 'F' ) . '</li>';
        }

        elseif ( is_year() ) {
            $html .= '<li class="breadcrumb-item active">' . get_the_time( 'Y' ) . '</li>';
        }

        elseif ( is_author() ) {
            $html .= '<li class="breadcrumb-item active">' . get_the_author() . '</li>';
        }
        elseif ( is_post_type_archive()) {
	        $ptype = get_queried_object()->name;

	        $post_type_obj = get_post_type_object( $ptype );


	        $html .= '<li class="breadcrumb-item active">' . $post_type_obj->labels->name. '</li>';
        }
        elseif ( is_tax("tipologie") ) {
        	// hook per amministrazione trasparente
	        $options=get_option( 'wpgov_at');
			if($options['page_id']){
				$page = get_post($options['page_id']);
				$html .= '<li class="breadcrumb-item"><a href="'.get_permalink($page).'">' . $page->post_title . '</a>'.$sep.'</li>';

			}
	        $html .= '<li class="breadcrumb-item active">' . single_term_title( '', false ) . '</li>';


        }
        elseif ( is_tax() ) {

	        $html .= '<li class="breadcrumb-item active">' . single_term_title( '', false ) . '</li>';


        }
        elseif ( is_search() ) {

        }

        elseif ( is_404() ) {

        }

    }

    $html .= '</ol>';

    echo $html;
}