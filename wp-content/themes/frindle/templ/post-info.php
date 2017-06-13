<p class="post-info"><div class="post-date"><i class="fa fa-calendar" style="font-size:14px"></i> <?php the_time( get_option( 'date_format' ) ); ?> </div>


	 <div class="post-author"> <span class="diff">| </span><i class="fa fa-user" style="font-size:14px"></i><?php esc_html__('by','frindle'); ?> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></div>

	 <div class="post-cat"> <span class="diff">| </span>
	<i class="fa fa-folder-open-o" style="font-size:14px"></i> <?php esc_html_e('Posted in','frindle'); ?>
			<?php
			
			$categories = get_the_category();
			$separator= ", ";
			$output ='';
			
			if($categories){
				
				foreach($categories as $category){
					
					$output .='<a href=" '.  esc_url(get_category_link($category->term_id)) . '">' . esc_attr($category->cat_name) . '</a>' . $separator;
				}
				
				echo trim($output, $separator);
				
			}
				
			
			
			?>
			</div>		 
	<?php if ( get_edit_post_link() ) : ?>
	<div class="post-edit"> <span class="diff">|</span> <i class="fa fa-pencil-square-o" style="font-size:14px"></i>
					 <?php edit_post_link( esc_html__( 'Edit', 'frindle' ) )?>
	</div>
	<?php endif; ?>		
	</p>