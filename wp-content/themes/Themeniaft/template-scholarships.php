<?php 
/**
 * template name: scholarships page
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
                    <?php get_sidebar('scholarships'); ?>
                </aside>
    </div> <!-- #main -->
</div> <!-- #main-container -->

<?php get_footer(); ?>
   