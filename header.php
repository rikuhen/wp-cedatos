<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<title><?php if (is_page()) {
				echo get_the_title();
			} else {
				echo bloginfo('description');
			}  ?> - <?php bloginfo('title'); ?></title>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
</head>

<body>
	<!-- Analytics -->
	<?php if (get_theme_mod('analytics_setting')) : ?>
		<?php echo get_theme_mod('analytics_setting') ?>
	<?php endif ?>
	<!-- LOGO -->
	<header>
		<div class="container justify-content-center">
			<div class="p-3 text-center">
				<?php if (has_custom_logo()) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<h3 class="site-title text-uppercase"> <?php bloginfo('name'); ?> </h3>
					<h4 class="text-uppercase border-0"> <?php bloginfo('description'); ?> </h4>
				<?php endif ?>
			</div>
		</div>
		<!-- PREHEADER -->
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-6 col-12 text-md-left text-left align-middle title-page">
					<?php
					// the_title( )
					if (is_page()) {
						the_title();
					} else { ?>
						Noticias
					<?php }  ?>
				</div>
				<div class="col-lg-4 col-md-6 col-12 align-middle text-center">
					<?php get_search_form(); ?>
				</div>

			</div>
		</div>

		<!-- NAV -->
		<?php if (has_nav_menu('main')) : ?>
			<div class="container-fluid text-center" id="main-nav">
				<div class="container">
					<nav class="nav-bar navbar-expand-md navbar-dark justify-content-center">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<?php
						$args = [
							'theme_location' => 'main',
							'container_class' => 'collapse navbar-collapse',
							'container_id' => 'main-menu',
							'menu_class' => 'navbar-nav',
							'walker' => new bootstrap_4_walker_nav_menu(),
						];
						wp_nav_menu($args);
						?>
					</nav>
				</div>
			</div>
		<?php endif; ?>
	</header>

	<div id="main-container" class="container pb-4">

		<!-- WIDGETS TOP -->
		<?php if (is_active_sidebar('precontent_left') || is_active_sidebar('precontent_right')) : ?>
			<div class="row">
				<?php if (is_active_sidebar('precontent_left')) : ?>
					<div class="col-12 justify-content-md-left justify-content-center text-center text-md-left <?php if (!is_active_sidebar('precontent_right')) : ?>col-md-12<?php else : ?>col-md-8<?php endif; ?> pt-3 px-lg-0">
						<?php dynamic_sidebar('precontent_left');  ?>
					</div>
				<?php endif ?>

				<?php if (is_active_sidebar('precontent_right')) : ?>
					<div class="col-12 justify-content-md-right justify-content-center mt-2 mt-md-0 text-center text-md-right <?php if (!is_active_sidebar('precontent_left')) : ?>col-md-12<?php else : ?>col-md-4<?php endif; ?> pt-3">
						<?php dynamic_sidebar('precontent_right');  ?>
					</div>
				<?php endif ?>
			</div>
		<?php endif ?>