<?php /* **************************************************************************************************** */
// Singular
/* **************************************************************************************************** */?>

<?php if (is_singular()) { ?>
    <?php if (underwood_sidebar_is(get_the_ID()) == 'right') { ?>
        <?php $sidebar_select = 'right'; ?>
        <?php $sidebar_select_aside_classes = ''; ?>
        <?php $sidebar_select_content_classes = ''; ?>
    <?php } else { ?>
        <?php $sidebar_select_aside_classes = 'col-sm-pull-9'; ?>
        <?php $sidebar_select_content_classes = 'col-sm-push-3'; ?>
    <?php } ?>
    <?php if (underwood_sidebar_is(get_the_ID()) == 'full') { ?>
        <div <?php post_class('row'); ?>>
            <div class="col-xs-12">
                <?php get_template_part( 'parts/routing', 'singular'); ?>
            </div>
        </div>
    <?php } else { ?>
        <div <?php post_class('row'); ?>>
            <div class="col-sm-9 <?php echo $sidebar_select_content_classes; ?>">
                <?php get_template_part( 'parts/routing', 'singular'); ?>   
            </div>
            <div class="col-sm-3 <?php echo $sidebar_select_aside_classes; ?> sidebar">
                <?php get_sidebar(); ?>
            </div>        
        </div>
    <?php } ?>

<?php /* **************************************************************************************************** */
// Blog
/* **************************************************************************************************** */ ?>
    
<?php } else { ?>
    <?php get_template_part( 'parts/routing', 'blog'); ?>
<?php } ?>