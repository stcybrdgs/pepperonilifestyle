<?php get_header(); ?>

<main>
	<div id="main">

						<h1 class="archives-h1"><?php
						if (is_category()) {
							echo __('Category:','megadrive') . ' ';
							single_cat_title();
						} elseif (is_tag()) {
							echo __('Tag:','megadrive') . ' ';
							single_tag_title();
						} elseif (is_author()) {
							echo __('Author:','megadrive') . ' ';
							the_author();
						} elseif (is_day()) {
							echo __('Day:','megadrive') . ' ';
							echo get_the_date('F j, Y');
						} elseif (is_month()) {
							echo __('Month:','megadrive') . ' ';
							echo get_the_date('F, Y');
						} elseif (is_year()) {
							echo __('Year:','megadrive') . ' ';
							echo get_the_date('Y');
						} else {
							echo __('Archives:','megadrive');
						}
					?></h1>
					
		<?php		
			get_template_part('loop');
		?>

	</div>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>