<?php
if ( ( $locations = get_nav_menu_locations() ) && isset( $locations['primary-menu'] ) ) : ?>
	<ul class="navbar-nav">
		<?php $menu = get_term( $locations['primary-menu'], 'nav_menu' );
		$primary_menu = mdi_get_menu_array($menu->term_id);

		foreach ($primary_menu as $menu_item) : ?>
			<?php if($menu_item['url'] == '#megamenu') : ?>
				<li class="nav-item dropdown megamenu">
					<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
						<span><?php echo $menu_item['title']; ?></span>
						<svg class="icon icon-xs">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/bootstrap-italia/svg/sprite.svg#it-expand">
							</use>
						</svg>
					</a>
					<div class="dropdown-menu">
						<div class="row">
							<div class="col-12">
								<div class="row">
									<div class="col-12 col-lg-6">
										<h3 class="it-heading-megacolumn no_toc">In Evidenza</h3>
										<div class="row">
										<div class="col-12 col-lg-6">
											<div class="card card-bg rounded shadow no-after mb-2">
												<div class="card-body text-center">
													<p class="card-text">
														<a href="#" class=""><img class="hero-logo d-inline-block" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-2025.png" alt="Logo Italia 2025"></a>
														<br><span class="d-inline-block mt-2">La strategia per l’innovazione e la trasformazione digitale del Paese</span>
													</p>
												</div>
											</div>
										</div>
										<div class="col-12 col-lg-6">
											<div class="card card-bg rounded shadow no-after mb-2">
												<div class="card-body text-center">
													<p class="card-text">
														<a href="#"><img class="hero-logo d-inline-block" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-repubblica-digitale.svg" alt="Logo Repubblica Digitale"></a>
														<br><span class="d-inline-block mt-2">Un progetto contro il digital divide, per una trasformazione digitale che non lasci indietro nessuno</span>
													</p>
												</div>
											</div>
										</div>
										</div>
									</div>
									<div class="col-12 col-lg-6">
										<h3 class="it-heading-megacolumn no_toc"><?php echo $menu_item['title']; ?></h3>
										<div class="row">
									<?php
									$items_count = count($menu_item['childrens']);
									$ites_per_col = ceil($items_count/2);
									$count = 0;?>
									<div class="col-12 col-lg-6">
										<div class="link-list-wrapper">
											<ul class="link-list">
												<?php foreach ($menu_item['childrens'] as $submenu_item) :
												if($count >= $ites_per_col) :
												$count = 0; ?>
											</ul>
										</div>
									</div>
									<div class="col-12 col-lg-6">
										<div class="link-list-wrapper">
											<ul class="link-list">
												<?php endif;
												$count++; ?>
												<li><a class=" list-item" href="<?php echo $submenu_item['url']; ?>" title="<?php echo esc_attr($submenu_item['title']); ?>"><span><?php echo $submenu_item['title']; ?></span></a></li>
												<?php endforeach; ?>
											</ul>
										</div>
									</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
			<?php else : ?>
				<?php if(empty($menu_item['childrens'])) : ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo $menu_item['url']; ?>" title="<?php echo esc_attr($menu_item['title']); ?>">
							<span><?php echo $menu_item['title']; ?></span>
						</a>
					</li>
				<?php else : ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
							<span><?php echo $menu_item['title']; ?></span>
							<svg class="icon icon-xs"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/bootstrap-italia/svg/sprite.svg#it-expand"></use></svg>
						</a>
						<div class="dropdown-menu">
							<div class="link-list-wrapper">
								<div class="row">
									<div class="col-12">
										<h3 class="it-heading-megacolumn no_toc"><?php echo $menu_item['title']; ?></h3>
									</div>
								</div>
								<ul class="link-list">
									<?php foreach ($menu_item['childrens'] as $submenu_item) : ?>
										<li>
											<a class="list-item" href="<?php echo $submenu_item['url']; ?>" title="<?php echo esc_attr($submenu_item['title']); ?>"><span><?php echo $submenu_item['title']; ?></span></a>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>
					</li>
				<?php endif; ?>
			<?php endif; ?>
		<?php endforeach;?>
	</ul>
<?php endif;