<?php 
/**
 * Template name: protected page
 *
 * @package WordPress
 * @subpackage themeniaft
 * @since theme niaft 1.0
 */
get_header(); 
global $current_user;
get_currentuserinfo();
?>
<?php if($current_user->ID!=null){?>
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
<?php }else{?>
        <div class="main-container">
            <div class="main clearfix">
                <div class="primary">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="entry-header">
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                            </header>
                            <div class="entry-content">
                            <?php if(is_page('ambassador-magazine')){ ?>
                                <p><?php 
                                    echo   htmlspecialchars_decode(get_field('content_area_restricted'));
                                 ?></p>
                                <?php }else{

                                    _e('THIS IS  A MEMBERS ONLY AREA PLEASE LOG IN.');
                                    }?>
                            </div><!-- .entry-content -->
                        </article><!-- #post -->
                    <?php endwhile; // end of the loop. ?>
                                
                </div>
                <aside class="sidebar">
                    <?php get_sidebar(); ?>
                </aside>
            </div> <!-- #main -->
        </div> <!-- #main-container -->
<?php }?>
<?php get_footer(); ?>
    