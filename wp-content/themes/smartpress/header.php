<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Smartpress
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	
	<a class="skip-link screen-reader-text" href="#content">
	<?php esc_html_e( 'Skip to content', 'smartpress' ); ?>
	</a>
	<?php
	
	$gallery_on_blog_items = get_theme_mod('smartpress_lightbox_on_blog_posts', 'no');

	$magnific_class = $gallery_on_blog_items == 'yes' ? 'magnific__lightbox' : '';
	
	?>

		<div id="pageContentWrapper">
		
			<?php get_template_part( VIEWSURI.'top-panel'); ?>
			
			<div class="container-fluid" style="padding: 0px;">	
				<div class="row">	
					<div class="col-sm-3 col-md-3" id="primarySidebar">	
						<div class="mainNavigation">
						<?php get_template_part( VIEWSURI.'main-nav'); ?>
						</div>
						<div class="hideOnMobile">
						<?php get_sidebar('primary'); ?>						
						</div><!-- ./ sidebar -->
					</div><!-- ./ col-md-3 -->
						<div class="col-sm-9 col-md-9">				
							<div class="site--content <?php echo $magnific_class; ?>" id="content">
