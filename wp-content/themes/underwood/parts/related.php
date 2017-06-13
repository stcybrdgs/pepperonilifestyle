<div class="singular-related">
    <h4 class="related-title">You Might Also Like...</h4>
    <span class="title-line"></span>
    <?php $underwood_related_savepost = $post; ?>
    <?php global $post; ?>
    <?php $underwood_related_tags = wp_get_post_tags($post->ID); ?>
    <?php if ($underwood_related_tags) { ?>
        <?php $underwood_related_tag_ids = array(); ?>
        <?php foreach($underwood_related_tags as $underwood_related_individual_tag) $underwood_related_tag_ids[] = $underwood_related_individual_tag->term_id; ?>
        <?php $args=array( 'tag_in' => $underwood_related_tag_ids, 'post_not_in' => array($post->ID), 'posts_per_page'=>4, 'ignore_sticky_posts' => 1, 'meta_query' => array(  array( 'key' => '_thumbnail_id', 'compare' => 'EXISTS' ),
    ) ); ?>
        <?php $my_query = new wp_query( $args ); ?>
        <?php while( $my_query->have_posts() ) { ?>
            <?php $my_query->the_post(); ?>
            <div class="related-entry">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('underwood-555-555'); ?><br />
                    <?php the_title( '<h4>', '</h4>' ); ?>
                </a>
            </div>
        <?php } ?>
    <?php } ?>
    <?php $post = $underwood_related_savepost; ?>
    <?php wp_reset_postdata(); ?>
</div>