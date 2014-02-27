<?php 
/**
 * Template name: display news and releases
 *
 * @package WordPress
 * @subpackage themeniaft
 * @since theme niaft 1.0
 */
get_header(); ?>
<div class="main-container">
  <div class="main clearfix">
      <div class="primary ">
          <?php while ( have_posts() ) : the_post(); ?> 
                  <header class="entry-header">
                    <h1 class="entry-title">
                    <?php 
                      the_title();
                    ?>
                    </h1>
                  </header> 
                  <?php the_content();?>       
          <?php endwhile;?>
          <?php
          wp_reset_query(); 
          $today = strtotime(date('Ymd'));
          $args=array(
              'post_type' => 'niaf_event',
              'post_status' => 'publish',
              'orderby' => 'date',
              'order' => 'DESC',
              'posts_per_page'=>-1,
              'meta_query' => array(
                array(
                    'key'   => 'date_niaf_event_publish',
                    'compare' => '>=',
                    'value'   => $today,
                )
              )              
            );          
          $myposts = new WP_Query( $args );
          if ( $myposts->have_posts() ) : ?>   
              <?php while ( $myposts->have_posts() ) : $myposts->the_post(); ?> 

                  <?php 
                   echo date('Ymd')."<br>";
                    echo get_field('date_niaf_event_publish');
                  get_template_part( 'content', 'taxonomy' ); 

                  ?>
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
   