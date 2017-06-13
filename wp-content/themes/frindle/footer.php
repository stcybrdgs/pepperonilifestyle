	<?php get_sidebar( 'footer' ); ?>
	
	<?php if ( has_nav_menu( 'footer' ) ): ?>
		<span class="trigger" id="menu-trigger"> <i class="fa fa-bars" style="font-size:18px"></i>&nbsp; </span>
		<div class="main-nav site-nav footer-nav">
			<?php 
					$args = array(
						'theme_location' => 'footer'
					);
			?>

			<?php wp_nav_menu( $args); ?>
		</div>
	<?php endif; ?>
		<div class="copycon">
			<p align=right ><span class="credit-link-parent"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></span> &copy;<?php echo date('Y'); ?><?php esc_html_e('. All Rights Reserved.','frindle'); ?> <br>
			<?php if ( get_theme_mod( 'footer_copy' ) == 0 ) : ?>
			<?php esc_html_e('Powered by','frindle'); ?><span class="credit-link"> <a href="http://wordpress.org" target="_blank"">WordPress</a></span>.

			<?php esc_html_e('Theme by ','frindle'); ?><span class="credit-link"><a href="http://phoenixwebsolutions.net">Phoenix Web Solutions</a> </span><?php 	endif; ?>
		</div>
	
	
		
		<?php if ( get_theme_mod( 'scroll_top' ) == 1 ) : ?>
		<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top --> <?php 	endif; ?>
	
</div><!-- container -->
<?php wp_footer(); ?>
</body>
</html>
