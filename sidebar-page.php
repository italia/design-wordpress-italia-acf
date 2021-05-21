    <?php
if(is_page()){
    global $post;
    if ($post->post_parent) {
        $ancestors = get_post_ancestors($post->ID);
        $parent = $ancestors[count($ancestors) - 1];
    } else {
        $parent = $post->ID;
    }
    // controllo se la pagina ha dei child
    $child_args = array(
        'post_parent' => $parent, // The parent id.
        'post_type'   => 'page',
        'post_status' => 'publish'
    );
    $children = get_children($child_args);
    if($children) {
        ?>

    <nav class="navbar it-navscroll-wrapper navbar-expand-lg it-bottom-navscroll it-left-side affix-top">
            <button class="custom-navbar-toggler" type="button" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation" data-target="#navbarNav"><span class="it-list"></span>Menu
            </button>
            <div class="navbar-collapsable" id="navbarNav">
                <div class="overlay"></div>
                <div class="close-div sr-only">
                    <button class="btn close-menu" type="button"><span class="it-close"></span>Chiudi</button>
                </div>
                <a class="it-back-button" href="#">
                    <svg class="icon icon-sm icon-primary align-top">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/bootstrap-italia/svg/sprite.svg#it-chevron-left"></use>
                    </svg>
                    <span>Indietro</span></a>
                <div class="menu-wrapper">

                    <div class="link-list-wrapper">
                        <h3><?php echo get_the_title($parent); ?></h3>
                        <ul class="link-list">
                            <li class="nav-item">
                                <?php
                                foreach ($children as $child) {
                                    $class = "";
                                    if($child->ID == $post->ID)
                                        $class = "active";
                                    ?>
                                    <a class="nav-link <?php echo $class; ?>"
                                       href="<?php echo get_permalink($child); ?>"><span><?php echo $child->post_title; ?></span></a>

                                    <?php
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    </nav>
     <?php
    }


    if (is_active_sidebar( 'page-sidebar' ) ) {
        dynamic_sidebar( 'page-sidebar' );
    }

}
?>
