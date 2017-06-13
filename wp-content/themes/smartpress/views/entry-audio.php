<?php

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

	$image = smartpress_get_the_Image(array('format'=>'array','size'=>'full'));
	
	$post_thumb_url = get_the_post_thumbnail_url();
	
	$smartpress_front_content_excerpt_content = get_theme_mod('smartpress_front_content_excerpt_content', 'excerpt');
	$gallery_on_blog_items = get_theme_mod('smartpress_lightbox_on_blog_posts', 'no');
	
?>

<article id="post-<?php echo $post->ID;?>" <?php post_class(array('post--entry'));?>>
    <div class="audio--wrapper" style="background-image: url(<?php echo esc_url($post_thumb_url);?>">
	<div class="ct--mask"></div>
    <div class="post-header">
        <h2><a title="<?php printf( esc_html__( 'Permalink to: %1$s', 'smartpress' ), get_the_title()); ?>" href="<?php echo esc_url(get_the_permalink());?>"><?php the_title(); ?></a></h2>
    </div>
	
	<div class="post-entry text-center" style="padding: 0 30px 0 30px">
		<?php the_excerpt(); ?>
    </div>
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
	<?php $audio = smartpress_themes_media_grabber(array('type'=>'audio')); ?>
	<?php if($audio): ?>
	<?php echo do_shortcode($audio ) ; ?>	
	<?php endif; ?>
	</div>
</article>