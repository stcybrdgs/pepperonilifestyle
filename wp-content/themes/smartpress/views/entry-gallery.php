<?php

$show_gallery_as = get_theme_mod('smartpress_show_post_gallery_as','slider');

$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	
	$byline = sprintf(
		esc_html_x( 'By %s', 'post author', 'smartpress' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	$smartpress_front_content_excerpt_content = get_theme_mod('smartpress_front_content_excerpt_content', 'excerpt');
	$gallery_on_blog_items = get_theme_mod('smartpress_lightbox_on_blog_posts', 'no');
	
	
	$prev = 'prev-'.Lnt_Random_String(25);
	$next = 'next-'.Lnt_Random_String(25);
	
?>
<article id="post-<?php echo $post->ID;?>" <?php post_class(array('post--entry'));?>>
<?php if($show_gallery_as == 'slider') : ?>

<?php wp_enqueue_script('smartpress_cycle_slideshow'); ?>
<div class="gallerySlideshow">
<ul class="cycle-slideshow"
    data-cycle-fx="scrollHorz"
	data-slides=">li"
	data-cycle-timeout="3500"
	data-cycle-pause-on-hover="true"
    data-cycle-prev="#<?php echo $prev; ?>"
    data-cycle-next="#<?php echo $next; ?>"
    >
   <?php
   
            $gallery = get_post_gallery( get_the_ID(), false );
			
			$item_count = count($gallery['src']);
			
			if($item_count >= 2) :
			
            /* Loop through all the image and output them one by one */
            foreach( $gallery['src'] as $src ) : ?>
                <li><img src="<?php echo $src; ?>" class="my-custom-class" alt="Gallery image" /></li>
                <?php
            endforeach;
			endif;
			
			
?>
   </ul>
   <div class="slideshowPagination">
		<div id="<?php echo $prev; ?>" class="prevNav"></div>
		<div id="<?php echo $next; ?>" class="nextNav"></div>
   </div>
   </div>
   <?php else: ?>
	<?php 
	if ( get_post_gallery() ) :
	echo get_post_gallery();
	endif; 
	?>
 <?php endif; ?>	
	<div class="post-header">
        <h2><a title="<?php printf( esc_html__( 'Permalink to: %1$s', 'smartpress' ), get_the_title()); ?>" href="<?php echo esc_url(get_the_permalink());?>"><?php the_title(); ?></a></h2>
    </div>
   
	
	<?php if($smartpress_front_content_excerpt_content == 'excerpt') : ?>
	 <div class="post-entry text-center" style="padding: 0 30px 0 30px">
		<?php the_excerpt(); ?>
    </div>
	<?php else: ?>
	 <div class="post-entry" style="padding: 0 30px 0 30px">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'smartpress' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );
		?>
    </div>
	<?php endif; ?>
    <footer class="entry--footer" style="margin-top: 40px;">
    <div class="post-meta">
        <div class="meta-info entry--footer">
            <div>
                <span><?php echo $byline; ?></span>
                <span><?php echo $time_string;?></span>
                <span>
				<?php 
				$categories_list = get_the_category_list( esc_html__( ', ', 'smartpress' ) );
				if ( $categories_list && smartpress_categorized_blog() ) {
				printf( '<span class="cat-links">' . esc_html__( 'In %1$s', 'smartpress' ) . '</span>', $categories_list ); // WPCS: XSS OK.
				}
				?>
				</span>
            </div>
        </div>
    </div>
	</footer>
  
</article>