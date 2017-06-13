<?php if (!is_singular()) { ?>
    <div class="blog-cat">
        <?php the_category( ', ' ); ?>
    </div>
    <?php } ?>
    <h2 class="blog-title">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_title(); ?>
        </a>
    </h2>
    <?php if (!is_page()) { ?>
    <div class="blog-meta <?php if ( !has_post_thumbnail() ) { echo "no-post-thumbnail"; } ?>">
        <span class="meta-italic">by </span>
        <div class="auth"><?php the_author_posts_link(); ?></div><span>, </span>
        <span class="meta-italic">on </span>
        <div class="date"><?php the_time(get_option( 'date_format' )); ?></div>
    </div>
<?php } ?>