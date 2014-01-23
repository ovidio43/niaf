<?php 
/**
 * The page containing .
 *
 * @package WordPress
 * @subpackage themeniaft
 * @since theme niaft 1.0
 */
get_header(); 
?>

        <div class="main-container">
            <div class="main clearfix">
				<div class="primary">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'themeNiaft' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    </header>
                    <?php
                        $args=array(
                            'post_type' => array('post', 'page'),
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'DESC',
                            's' => $s,
                            'posts_per_page'=>-1
                          );                            
                        $myposts = new WP_Query( $args );
                    if ( $myposts->have_posts() ) : 
                    while ( $myposts->have_posts() ) : $myposts->the_post(); ?>
                    <div class="entry-content">
                        <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                        <?php the_excerpt(); ?>
                    </div><!-- .entry-content -->
                    <?php endwhile; else: ?>
                    <p><?php _e('Sorry, no slider matched your criteria.'); ?></p>
                    <?php endif; ?>                    
                </article><!-- #post -->  
                </div>
                <aside class="sidebar">
                    <?php get_sidebar(); ?>
                </aside>
    </div> <!-- #main -->
</div> <!-- #main-container -->

<?php get_footer(); ?>
   