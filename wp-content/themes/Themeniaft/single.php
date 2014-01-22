<?php 
/**
 * The page containing .
 *
 * @package WordPress
 * @subpackage themeniaft
 * @since theme niaft 1.0
 */
get_header(); 
global $current_user;
    get_currentuserinfo();
    $type = 'member-area';
    if($current_user->ID!=null){
        $args=array(
            'post_type' => array( 'member-area'),
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page'=>-1,
            'p'=>get_the_ID(),
            'meta_query' => array(
                 array(
                    'key' => "wpcf-level-$current_user->user_lastname",
                    'value' => strtoupper($current_user->user_lastname),
                    'type' => 'STRING',
                    'compare' => '='
                )
            )
        );
    }else{
        $args=array(
            'p'=>get_the_ID(),
            'post_type' => array( 'post', 'home-slider','niaf-partner','news-events','niaf-featured','niaf-highlights','ai1ec_event')
        );  
    }
    $myposts = new WP_Query( $args );
?>

    <div class="main-container">
        <div class="main clearfix">
            <?php if ( $myposts->have_posts() ) :?>
			<div class="primary">
                <?php while ( $myposts->have_posts() ) : $myposts->the_post(); ?>
                    <?php get_template_part( 'content', 'page' ); ?>
                <?php endwhile; // end of the loop. ?>
            </div>
            <aside class="sidebar">
                <?php get_sidebar(); ?>
            </aside>
        <?php else: 
        header( 'Location: '.get_bloginfo('url') ) ;
         endif; ?>
        </div> <!-- #main -->
    </div> <!-- #main-container -->

<?php get_footer(); ?>
   