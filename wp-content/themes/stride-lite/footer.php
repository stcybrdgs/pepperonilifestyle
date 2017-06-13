<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package stride
 */

?>

	</div><!-- #content -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="foo-scroll">
			<a href="" id="scrollHome"><span class="fa fa-arrow-up"></span></a>
		</div>
		<div class="site-name">
			<p><?php echo bloginfo('name'); ?></p>
		</div>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'stride-lite' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'stride-lite' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'stride-lite' ), 'stride-lite', '<a href="https://tidyhive.com/" rel="designer">Tidyhive</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
