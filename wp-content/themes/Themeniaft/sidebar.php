<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage themeniaft
 * @since theme niaft 1.0
 */


?>
	<?php if ( is_active_sidebar( 'main_sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'main_sidebar' ); ?>
	<?php endif; ?>