        </div><!-- /container -->
    </div><!-- /palette -->
	<?php if ( is_active_sidebar( 'instagram' ) ) : ?>
	    <div id="instagram-row" class="<?php underwood_palette_classes(); ?>">
    		<?php dynamic_sidebar( 'instagram' ); ?>
    		<div class="clearboth"></div>
	    </div>
    <?php endif; ?>
    <footer id="footer-row" class="<?php underwood_palette_classes(); ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <?php dynamic_sidebar('footer_left'); ?>
                </div>
                <div class="col-md-4">
                    <?php dynamic_sidebar('footer_center'); ?>
                </div>
                <div class="col-md-4">
                    <?php dynamic_sidebar('footer_right'); ?>
                </div>
            </div>
        </div>
    </footer>
    <div id="copyright-row">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p class="copyright"><?php echo esc_html(underwood_get_option('underwood_copyright')); ?></p>
                </div>
                <div class="col-md-6">
                    <p class="credit"><?php _e('Design by', 'underwood') ?> <a href="https://themeshift.com/">ThemeShift</a>.</p>    
                </div>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>
</html>