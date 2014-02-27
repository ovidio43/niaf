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
          <?php
          if ( have_posts() ) : ?>
                  <header class="entry-header">
                    <h1 class="entry-title">
                    <?php 
                    single_cat_title();
                    ?>
                    </h1>
                  </header>                     
              <?php while ( have_posts() ) : the_post(); ?>                         
                  <?php get_template_part( 'content', 'taxonomy' ); ?>
              <?php endwhile;?>

          <?php wp_reset_query(); 
endif;
          ?>  
      </div>
      <aside class="sidebar">
          <?php get_sidebar(); ?>
      </aside>
  </div> <!-- #main -->
</div> <!-- #main-container -->

<?php get_footer(); ?>
   