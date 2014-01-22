<?php 
/**
 * The page containing .
 *
 * @package WordPress
 * @subpackage themeniaft
 * @since theme niaft 1.0
 */
get_header(); ?>
<?php global $current_user;
      get_currentuserinfo();

      /*echo 'Username: ' . $current_user->user_login . "\n";
      echo 'User email: ' . $current_user->user_email . "\n";
      echo 'User first name: ' . $current_user->user_firstname . "\n";
      echo 'User last name: ' . $current_user->user_lastname . "\n";
      echo 'User display name: ' . $current_user->display_name . "\n";
      echo 'User ID: ' . $current_user->ID . "\n";*/
?>
        <div class="main-container">
            <div class="main clearfix">
				<div class="primary">
                    <?php
                    $term_slug = get_query_var( 'term' );
                    $taxonomyName = get_query_var( 'taxonomy' );
                    echo $term_slug;
                    echo $taxonomyName;
                        $type = 'member-area';
                        $args=array(
                            'post_type' => $type,
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'posts_per_page'=>-1,
                            'meta_query' => array(
                                array(
                                    'key' => "wpcf-level-$current_user->user_lastname",
                                    'value' => strtoupper($current_user->user_lastname),
                                    'type' => 'STRING',
                                    'compare' => '='
                                )
                            ),  
                            'tax_query' => array(
                              array(
                                'taxonomy' => 'member-category',
                                'field' => 'slug',
                                'terms' => $term_slug
                              )
                            )
                          );                                 
                        $myposts = new WP_Query( $args );
                    if ( $myposts->have_posts() ) : ?>
                        <?php while ( $myposts->have_posts() ) : $myposts->the_post(); ?>
                            <?php get_template_part( 'content', 'archive' ); ?>
                        <?php endwhile; else: ?>
                        <p><?php _e('Sorry, no matched your criteria.'); ?></p>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>  
                </div>
                <aside class="sidebar">
                    <?php get_sidebar(); ?>
                </aside>
    </div> <!-- #main -->
</div> <!-- #main-container -->

<?php get_footer(); ?>
   