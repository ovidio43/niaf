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
                    <?php while ( have_posts() ) : the_post(); 
                        $title = get_the_title();
                        $content = get_the_content();
                        $content2 = htmlspecialchars_decode(get_field('content_area_restricted'));
                        endwhile;
                    ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="entry-header">
                                <h1 class="entry-title"><?php echo $title; ?></h1>
                            </header>
                            <div class="entry-content">
                                <?php 
                                
                                echo apply_filters( 'the_content', $content );
                                ?>
                                <?php 
                                if(is_page('my-niaf')){
                                $args = array(
                                    'post_type' => 'news_my_niaf',
                                    'post_status' => 'publish',
                                    'order' => 'DESC',
                                    'posts_per_page' => 10
                                );
                                $myposts = new WP_Query($args);
                                if ($myposts->have_posts()) : ?>  
                                    <table border="0" class="wrap-my-niaf">
                                        <tr><td><b>Date</b></td> <td><b>Announcements</b></td></tr>
                                    <?php while ($myposts->have_posts()) : $myposts->the_post(); ?> 
                                    <tr><td><span><?php echo get_the_date();?>&nbsp;&nbsp;&nbsp;</span></td> <td><a href="<?php the_permalink();?>"><?php the_title();?></a></td></tr>
                                    <?php endwhile; ?>
                                    </table>
                                    <a href="/news_my_niaf/">View previous announcements</a>&gt;&gt;
                                    <p style="text-align: center;">___________________________________________</p>
                                <?php endif; ?>

                                <?php 
                                    echo $content2;
                                }?>                                
                            </div><!-- .entry-content -->
                        </article><!-- #post -->

                   
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

                                    _e('<br><img src="http://www.niaf.org/wp-content/uploads/2014/03/my-NIAF-logo.png" align="right">
									MyNIAF is an area of the website that is reserved exclusively for NIAF members.  If you are a current member, please proceed to log in on the right.
									<br>
									<br>
									If you are not a member, you are missing out!');
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
    