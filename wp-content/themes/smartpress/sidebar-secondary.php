<?php
/**
 * The sidebar containing footer widgets
 *
 * @package smartpress
 */

if ( ! is_active_sidebar( 'secondary' ) ) {
	return;
}
?>

<div class="primary-sidebar">
	<?php dynamic_sidebar( 'secondary' ); ?>

</div>