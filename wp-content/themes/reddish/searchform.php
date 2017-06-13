<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" placeholder="<?php esc_attr_e( 'Search Site...', 'reddish' ); ?>" value="<?php the_search_query(); ?>" name="s" id="s" />
	<input type="hidden" class="search_submit" />
</form>
