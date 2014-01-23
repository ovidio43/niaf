<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h3 class="entry-title"><?php the_title(); ?></h3>
		<div class="entry-content">
			<?php the_content(); ?>
			<hr>
		</div><!-- .entry-content -->
	</article><!-- #post -->
