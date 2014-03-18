<?php
/**
 * Template name: bracco scholarship application form
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
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
                <div class="entry-content">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; // end of the loop. ?>
                    <div class="wrap-form">
                        <?php
                        if ($_POST['submit']=='') {
                            require_once (get_template_directory() . '/include/form-bracco-scholarship-application-form.php');
                        } else {
                            require_once (get_template_directory() . '/include/send-bracco-scholarship-application-form.php');
                        }                        
                        ?>
                    </div>
                </div><!-- .entry-content -->
            </article><!-- #post -->        
        </div>
        <aside class="sidebar">
            <?php get_sidebar(); ?>
        </aside>
    </div> <!-- #main -->
</div> <!-- #main-container -->
<?php get_footer(); 
