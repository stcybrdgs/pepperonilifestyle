<?php $h=0; // master ?>
<?php $i=1; // layout counter, 1=left, 3=right ?>
<?php if ( have_posts() ) { ?>
    <?php while ( have_posts() ) { ?>
        <?php the_post(); ?>
        <?php if ($i==1) { ?>
            <?php // Left ?>
            <?php echo '<div class="row grid-row">'; // open row ?>
            <?php echo '<div class="col-sm-4">'; ?>
            <?php get_template_part( 'parts/blog', 'layout-grid'); ?>
            <?php echo '</div>'; ?>
            <?php $i++; ?>
        <?php } else if ($i==3) { ?>
            <?php // Right ?>
            <?php echo '<div class="col-sm-4">'; ?>
            <?php get_template_part( 'parts/blog', 'layout-grid'); ?>
            <?php echo '</div>'; ?>
            <?php echo '</div>'; // close row ?>
            <?php $i=1; // switch layouts ?>
        <?php } else { ?>
            <?php // Middle ?>
            <?php echo '<div class="col-sm-4">'; ?>
            <?php get_template_part( 'parts/blog', 'layout-grid'); ?>
            <?php echo '</div>'; ?>
            <?php $i++; ?>
        <?php } ?>
        <?php $h++; ?>
        <?php // Close if left open ?>
        <?php $items = count($posts); ?>
        <?php if ((($i==2) || ($i==3)) && ($h==$items)) { ?>
            <?php echo '</div>'; // Close row ?>
        <?php } ?>
	<?php } ?>
	<?php get_template_part( 'parts/blog', 'layout-next-prev'); ?>
<?php } ?>