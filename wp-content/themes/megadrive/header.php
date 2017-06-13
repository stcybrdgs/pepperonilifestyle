<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0, user-scalable=yes">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header>
	<nav>
	<div id="menu-top">
		<div id="menu-top-wrapper">
			<?php wp_nav_menu(array('theme_location' => 'top-menu', 'depth' => 1)); ?>
		</div>
	</div>
	</nav>
	<div id="header">
		<div id="header-wrapper">
			<div id="logo">
				<?php 
				if ( function_exists('the_custom_logo') && has_custom_logo() ) {
					the_custom_logo();
				} else { ?>
					<p class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</p>
				<?php } ?>
			</div>
		</div>
	</div>
	
	<nav>
	<div id="menu">
		<div id="menu-wrapper">
			<?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
			<div id="search">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
	</nav>	
	</header>
	<div id="wrapper">