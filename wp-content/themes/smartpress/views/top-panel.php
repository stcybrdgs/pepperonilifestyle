<?php

$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );

?>

<div class="top--panel">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-md-4">
				<div class="branding">
				<div class="top-branding">
				<a href="<?php echo esc_url(site_url());?>">
				<?php
				if ( function_exists( 'the_custom_logo' )):
					if($image[0]){
						echo '<img src="'.$image[0].'" alt="'.get_bloginfo('name').'" />';
					}else{
						echo '<span class="the_logo">'. get_bloginfo('name') .'</span>';
					}
				endif; ?>	
				</a>				
				<?php if (get_theme_mod( 'smartpress_show_description',true) == true) : ?>
				<span class="navbar-site-desc text-muted"><?php bloginfo('description');?></span>
				<?php endif; ?>
				</div>
				</div>
			</div>
			<div class="col-sm-4 col-md-4">
			<div id="headerSearch">
			<div>
				<?php get_search_form();?>
			</div>
			</div>
			
			</div>
			<div class="col-sm-4 col-md-4">
				
				<div id="top-utilities">
					<div>
						<ul class="top-utilities">
						<?php do_action('top_utilities');?>
						</ul>
					</div>	
				</div>
			
			</div>
			
		</div>
	</div>
</div>