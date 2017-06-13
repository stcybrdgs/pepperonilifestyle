<?php
/**
 * The sidebar main widgets
 *
 * @package smartpress
 */

if ( ! is_active_sidebar( 'primary' ) ) {
	return;
}
?>

<div class="primary-sidebar">
	<?php dynamic_sidebar( 'primary' ); ?>

</div>