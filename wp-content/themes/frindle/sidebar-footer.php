<?php
	// If footer sidebars do not have widget let's bail.

	if ( ! is_active_sidebar( 'footer1' ) && ! is_active_sidebar( 'footer2' ) && ! is_active_sidebar( 'footer3' ) )
		return;
	// If we made it this far we must have widgets.
	?>	
	
	
	
	
	<footer class="site-footer">
	
		<!-- footer-widgets -->
		<div class="footer-widgets clearfix">

				<?php if(is_active_sidebar('footer1')) :?>
							<div class="footer-widget-area">
								<?php dynamic_sidebar('footer1'); ?>
							</div>
				<?php endif;?>
				
				<?php if(is_active_sidebar('footer2')) :?>
							<div class="footer-widget-area">
								<?php dynamic_sidebar('footer2'); ?>
							</div>
				<?php endif;?>
				
				<?php if(is_active_sidebar('footer3')) :?>
							<div class="footer-widget-area">
								<?php dynamic_sidebar('footer3'); ?>
							</div>
				<?php endif; ?>
		</div>
		
		<!-- /footer-widgets -->