			</div>
		<?php // END OF - wrapper ?>

		<div id="footer-clear"></div>
		<footer>
		<div id="footer">
			<div id="footer-wrapper">
				<div id="footer-sidebar">
				<?php dynamic_sidebar('sidebar-footer-1'); ?>
				<?php dynamic_sidebar('sidebar-footer-2'); ?>
				<?php dynamic_sidebar('sidebar-footer-3'); ?>
				</div>
				<div id="footer-info">
					<p><?php echo __('Copyright &copy;','megadrive') . ' ' . date('Y') . ' '; bloginfo('name');?></p>
				</div>
				</div>
		</div>
		</footer>
		<?php wp_footer();?>
</body>
</html>