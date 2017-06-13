<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Smartpress
 */

?>

	<div class="row hideOnDesktop" style="margin-top: 20px">
	<div class="primarySidebar text-center">
	<?php get_sidebar('secondary'); ?>						
	</div><!-- ./ sidebar -->
	</div>

	</div><!-- ./ col-md-9 -->	
	</div><!-- ./ row -->	
	
	</div><!-- ./ container -->
	</div><!-- # /content -->
	</div><!-- # / pageContentWrapper -->
	
<div class="clearfix"></div>

	<!-- Footer -->
        <div class="site--info text-center clearfix">
            <p><?php printf( esc_html__( '&copy; %1$s', 'smartpress' ), date('Y')); ?> 
			<a href="<?php echo esc_url(site_url()); ?>"><?php echo get_bloginfo('name') ; ?></a>
			<?php echo esc_html__(' All Rights Reserved &nbsp;&nbsp;','smartpress');?>
               <?php if(function_exists('smartpress_footer_social_links')): ?>
			   <?php smartpress_footer_social_links(); ?>
			   <?php endif;?>
            </p>
            <p><?php printf( esc_html__( 'Theme %1$s by %2$s.', 'smartpress' ), 'Smartpress', '<a href="https://level9themes.com" rel="designer">Level9themes</a>' ); ?></p>
            <div class="clearfix"></div>
        </div>  
	<!-- ./ Footer -->	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
