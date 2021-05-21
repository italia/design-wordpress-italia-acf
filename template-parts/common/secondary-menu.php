<?php
if ( ( $locations = get_nav_menu_locations() ) && isset( $locations['secondary-menu'] ) ) : ?>
	<ul class="navbar-nav navbar-secondary">
		<?php $menu = get_term( $locations['secondary-menu'], 'nav_menu' );
		$secondary_menu = mdi_get_menu_array($menu->term_id);

		foreach ($secondary_menu as $menu_item) : ?>
			<li class="nav-item">
				<a class="nav-link text-uppercase font-weight-semibold" href="<?php echo $menu_item['url']; ?>" title="<?php echo esc_attr($menu_item['title']); ?>"><span><?php echo $menu_item['title']; ?></span></a>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif;