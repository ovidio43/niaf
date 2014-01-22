<?php 
/**
 * The page containing .
 *
 * @package WordPress
 * @subpackage themeniaft
 * @since theme niaft 1.0
 */
get_header(); ?>

        <div class="main-container">
            <div class="main clearfix">
				<div class="primary">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content', 'page' ); ?>
                    <?php endwhile; // end of the loop. ?>
                </div>
                <aside class="sidebar">
                    <?php get_sidebar(); ?>
                </aside>
    </div> <!-- #main -->
</div> <!-- #main-container -->

<?php get_footer(); ?>
   