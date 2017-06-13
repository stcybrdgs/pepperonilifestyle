<?php
/*  The popular post widget with thumbnail!*/

class frindle_pop_posts extends WP_Widget
{
	 function __construct(){

        $widget_ops = array('classname' => 'frindle-popular-posts','description' => __( "Display Popular Posts with this widget or you can also use Frindle Posts widget for more filters.",'frindle') );
		    parent::__construct('frindle_pop_posts', esc_html__('Frindle Popular Posts Widget','frindle'), $widget_ops);

			}

    function widget($args , $instance) {

	extract($args);
	$title = apply_filters('widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        //$title = isset($instance['title']) ? $instance['title'] : esc_html_e('Popular Posts','frindle');
        $limit = isset($instance['limit']) ? $instance['limit'] : 5;

      echo $before_widget;
      echo $before_title;
      echo $title;
      echo $after_title;

		/**
		 * Widget Content
		 */

	 ?>

    <!-- popular posts -->
          <div class="popular-posts-wrapper">

                <?php

                  $featured_args = array(
                      'posts_per_page' => $limit,
                      'orderby' => 'comment_count',
                      'order' => 'DESC',
                      'ignore_sticky_posts' => 1
                    );

                  $featured_query = new WP_Query($featured_args);

                  
                  // Check if zilla likes plugin exists
                   
                  if($featured_query->have_posts()) : while($featured_query->have_posts()) : $featured_query->the_post();

                    ?>

                        <?php if(get_the_content() != '') : ?>

						
						<!-- Output style -->
                        <!-- the post  -->
                        <div class="pop-post">

                          <!-- image -->
                          <div class="post-image <?php echo get_post_format(); ?>">

                                <a href="<?php echo esc_url(get_permalink()); ?>"><?php
                                if(get_post_format() != 'quote') {
                                  echo get_the_post_thumbnail(get_the_ID() , 'frindle-popular-post');
                                }
								else {
									{ ?>
					<img src="<?php echo get_template_directory(); ?>/Images/default-featured-image.png" alt="<?php the_title_attribute(); ?>" />
			<?php }
									
									
								}
                                 ?></a>

                          </div> <!-- end post image -->

                          <!-- content -->
                          <div class="post-content">

                              <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo get_the_title(); ?></a>
								
                          </div><!-- end content -->
                        </div><!-- end post -->

                        <?php endif; ?>

                    <?php

                  endwhile; endif; wp_reset_postdata();

                 ?>

          </div> <!-- end wrapper -->

		<?php

		echo $after_widget;
    }

	// the widget controller
    function form($instance) {

      if(!isset($instance['title'])) $instance['title'] = __('Popular Posts','frindle');
      if(!isset($instance['limit'])) $instance['limit'] = 5;

    	?>

      <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title','frindle') ?></label>

      <input  type="text" value="<?php echo esc_attr($instance['title']); ?>"
              name="<?php echo esc_attr($this->get_field_name('title')); ?>"
              id="<?php $this->get_field_id('title'); ?>"
              class="widefat" />
      </p>

      <p><label for="<?php echo esc_attr($this->get_field_id('limit')); ?>"><?php esc_html_e('Limit Posts Number','frindle') ?></label>

      <input  type="text" value="<?php echo esc_attr($instance['limit']); ?>"
              name="<?php echo esc_attr($this->get_field_name('limit')); ?>"
              id="<?php $this->get_field_id('limit'); ?>"
              class="widefat" />
      <p>

    	<?php
    }
}
