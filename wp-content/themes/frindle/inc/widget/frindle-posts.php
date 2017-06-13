<?php
/*Frindle Posts Widget*/

class FrindlePosts extends WP_Widget {

	function __construct() {
		parent::__construct(
      'FrindlePosts',
      __('Frindle Posts', 'frindle'),
      array(
        'description' => __('Display posts from a category or you may display recent and poplular posts', 'frindle'),
        'classname' => 'widget_posts'
      )
    );
	}

  public function get_default_val() {
    return array(
      'title'       => '',
      // Posts
      'posts_thumb'     => 1,
      'posts_category'  => 1,
      'posts_date'    => 1,
      'posts_num'     => '4',
      'posts_cat_id'    => '0',
      'posts_orderby'   => 'date',
      'posts_time'    => '0',
    );
  }


  /*  Widget
  /* ------------------------------------ */
	public function widget($args, $instance) {
		extract( $args );

    $defaults = $this -> get_default_val();

    $instance = wp_parse_args( (array) $instance, $defaults );

		$title = apply_filters('widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$output = $before_widget."\n";
		if($title)
			$output .= $before_title.$title.$after_title;
		ob_start();

?>

	<?php
		$posts = new WP_Query( array(
			'post_type'				=> array( 'post' ),
			'showposts'				=> $instance['posts_num'],
			'cat'					=> $instance['posts_cat_id'],
			'ignore_sticky_posts'	=> true,
			'orderby'				=> $instance['posts_orderby'],
			'order'					=> 'dsc',
			'meta_key' 				=> '_thumbnail_id',
			'date_query' => array(
				array(
					'after' => $instance['posts_time'],
				),
			),
		) );
	?>
	
	<ul class="posts-sidebar group <?php if($instance['posts_thumb']) { echo 'thumbs-enabled'; } ?>">
		<?php while ($posts->have_posts()): $posts->the_post(); ?>
		<li class="post-side-container">
			<div class="frindle-post-clear">
			<?php if($instance['posts_thumb']) { // Thumbnails enabled? ?>
			<div class="post-item-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php if ( has_post_thumbnail() ): ?>
						<?php the_post_thumbnail('frindle-popular-post'); ?>
					<?php else: ?>
						<img src="<?php echo get_template_directory(); ?>/Images/default-featured-image.png" height="100" width="100"> </img>
					<?php endif; ?>
					
				</a>
			</div>
			<?php } ?>

			<div class="post-item-inner group">
				<div class="post-item-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">

				<?php the_title(); ?></a></gmp_div()>
				<?php if($instance['posts_date']) { ?><div class="post-item-date"><i class="fa fa-calendar" style="font-size:12px"></i> <?php the_time( get_option( 'date_format' ) ); ?></div><?php } ?>
				<?php if($instance['posts_category']) { ?><div class="post-item-category"><i class="fa fa-folder-open-o" style="font-size:11px"></i> <?php the_category(' | '); ?></div><?php } ?>
			</div>
			</div>
		</li>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</ul>
	<!--/posts-->

<?php
		$output .= ob_get_clean();
		$output .= $after_widget."\n";
		echo $output;
	}

/*  Widget update
/* ------------------------------------ */
	public function update($new,$old) {
		$instance = $old;
		$instance['title'] = strip_tags($new['title']);
	// Posts
		$instance['posts_thumb'] = $new['posts_thumb']?1:0;
		$instance['posts_category'] = $new['posts_category']?1:0;
		$instance['posts_date'] = $new['posts_date']?1:0;
		$instance['posts_num'] = strip_tags($new['posts_num']);
		$instance['posts_cat_id'] = strip_tags($new['posts_cat_id']);
		$instance['posts_orderby'] = strip_tags($new['posts_orderby']);
		$instance['posts_time'] = strip_tags($new['posts_time']);
		return $instance;
	}

/*  Widget form
/* ------------------------------------ */
	public function form($instance) {
		// Default widget settings
		$defaults = $this -> get_default_val();
		$instance = wp_parse_args( (array) $instance, $defaults );
?>

	<style>
	.widget .widget-inside .options-posts .postform { width: 100%; }
	.widget .widget-inside .options-posts p { margin: 3px 0; }
	.widget .widget-inside .options-posts hr { margin: 20px 0 10px; }
	.widget .widget-inside .options-posts h4 { margin-bottom: 10px; }
	</style>

	<div class="options-posts">
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title','frindle') ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $instance["title"] ); ?>" />
		</p>

		<h4><?php esc_html_e('List Posts','frindle') ?></h4>

		<p>
			<input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id('posts_thumb') ); ?>" name="<?php echo esc_attr( $this->get_field_name('posts_thumb') ); ?>" <?php checked( (bool) $instance["posts_thumb"], true ); ?>>
			<label for="<?php echo esc_attr( $this->get_field_id('posts_thumb') ); ?>"><?php esc_html_e('Show thumbnails','frindle') ?></label>
		</p>
		<p>
			<label style="width: 55%; display: inline-block;" for="<?php echo esc_attr( $this->get_field_id("posts_num") ); ?>"><?php esc_html_e('Items to show','frindle') ?></label>
			<input style="width:20%;" id="<?php echo esc_attr( $this->get_field_id("posts_num") ); ?>" name="<?php echo esc_attr( $this->get_field_name("posts_num") ); ?>" type="text" value="<?php echo absint($instance["posts_num"]); ?>" size='3' />
		</p>
		<p>
			<label style="width: 100%; display: inline-block;" for="<?php echo esc_attr( $this->get_field_id("posts_cat_id") ); ?>"><?php esc_html_e('Category:','frindle') ?></label>
			<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("posts_cat_id"), 'selected' => $instance["posts_cat_id"], 'show_option_all' => 'All', 'show_count' => true ) ); ?>
		</p>
		<p style="padding-top: 0.3em;">
			<label style="width: 100%; display: inline-block;" for="<?php echo esc_attr( $this->get_field_id("posts_orderby") ); ?>"><?php esc_html_e('Order by:','frindle') ?></label>
			<select style="width: 100%;" id="<?php echo esc_attr( $this->get_field_id("posts_orderby") ); ?>" name="<?php echo esc_attr( $this->get_field_name("posts_orderby") ); ?>">
			  <option value="date"<?php selected( $instance["posts_orderby"], "date" ); ?>><?php esc_html_e('Most recent','frindle') ?></option>
			  <option value="comment_count"<?php selected( $instance["posts_orderby"], "comment_count" ); ?>><?php esc_html_e('Most commented','frindle') ?></option>
			  <option value="rand"<?php selected( $instance["posts_orderby"], "rand" ); ?>><?php esc_html_e('Random','frindle') ?></option>
			</select>
		</p>
		<p style="padding-top: 0.3em;">
			<label style="width: 100%; display: inline-block;" for="<?php echo esc_attr( $this->get_field_id("posts_time") ); ?>"><?php esc_html_e('Posts from:','frindle') ?></label>
			<select style="width: 100%;" id="<?php echo esc_attr( $this->get_field_id("posts_time") ); ?>" name="<?php echo esc_attr( $this->get_field_name("posts_time") ); ?>">
			  <option value="0"<?php selected( $instance["posts_time"], "0" ); ?>><?php esc_html_e('All time','frindle') ?></option>
			  <option value="1 year ago"<?php selected( $instance["posts_time"], "1 year ago" ); ?>><?php esc_html_e('This year','frindle') ?></option>
			  <option value="1 month ago"<?php selected( $instance["posts_time"], "1 month ago" ); ?>><?php esc_html_e('This month','frindle') ?></option>
			  <option value="1 week ago"<?php selected( $instance["posts_time"], "1 week ago" ); ?>><?php esc_html_e('This week','frindle') ?></option>
			  <option value="1 day ago"<?php selected( $instance["posts_time"], "1 day ago" ); ?>><?php esc_html_e('Past 24 hours','frindle') ?></option>
			</select>
		</p>

		<hr>
		<h4><?php esc_html_e('Post Info','frindle') ?></h4>

		<p>
			<input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id('posts_category') ); ?>" name="<?php echo esc_attr( $this->get_field_name('posts_category') ); ?>" <?php checked( (bool) $instance["posts_category"], true ); ?>>
			<label for="<?php echo esc_attr( $this->get_field_id('posts_category') ); ?>"><?php esc_html_e('Show categories','frindle') ?></label>
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id('posts_date') ); ?>" name="<?php echo esc_attr( $this->get_field_name('posts_date') ); ?>" <?php checked( (bool) $instance["posts_date"], true ); ?>>
			<label for="<?php echo esc_attr( $this->get_field_id('posts_date') ); ?>"><?php esc_html_e('Show dates','frindle') ?></label>
		</p>

		<hr>

	</div>
<?php

}

}


if ( ! function_exists( 'register_frindle_posts_widget' ) ) {

	function register_frindle_posts_widget() {
		register_widget( 'FrindlePosts' );
	}

}
add_action( 'widgets_init', 'register_frindle_posts_widget' );
