<?php if ((underwood_get_option('post_hide_tags')!='1') || (underwood_get_option('post_hide_social')!='1')) { ?>
	<div class="tags-wrap">
		<?php if (underwood_get_option('post_hide_tags')!='1') { ?>
			<?php if (has_tag()) { ?>
				<?php the_tags("","<span class='tag-sep'>/</span>",""); ?>
			<?php } ?>	
		<?php } ?>
	</div>
<?php } ?>