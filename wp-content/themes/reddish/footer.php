				<div class="clear"></div>
			</div><!-- .container -->
		<div class="clear"></div>
		</div><!-- .wrapper-->
		<div class="wide_footer">
			<div class="container footer">
				<?php reddish_display_bloginfo_name(); ?>
				<div id="blog_info">
					<h5 id="blog_info_text" ><?php _e( 'Powered by WordPress and', 'reddish' ); ?> <a href="<?php echo esc_url( wp_get_theme()->get( 'AuthorURI' ) ); ?>">Reddish</a> <?php _e( 'Theme', 'reddish' ); ?> </h5>
				</div><!-- #blog_info -->
				<div class="clear"></div><!-- to make footer have background-color of container_12-->
			</div><!-- .container footer -->
		</div><!-- .wide_footer-->
		<?php wp_footer(); ?>
	</body>
</html>
