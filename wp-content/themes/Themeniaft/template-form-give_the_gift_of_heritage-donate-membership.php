<?php
/**
 * Template name: form give the gif of heritage
 *
 * @package WordPress
 * @subpackage themeniaft
 * @since theme niaft 1.0
 */
get_header();

$step = $_POST['step'];
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
                        <script type="text/javascript">
                            jQuery(document).ready(function() {
                                jQuery('#btn-previous').on('click', function() {
                                    jQuery('#formBack').submit();
                                });
                                jQuery('.checkedYes').on('click', function() {
                                    if (jQuery(this).is(':checked')) {
                                        jQuery(this).siblings('input').val('yes');
                                    } else {
                                        jQuery(this).siblings('input').val('no');
                                    }
                                });
                            });
                        </script>
                        <?php
                        if ($step == '1' || $step == '') {
                            require_once (get_template_directory() . '/include/form-donate-membership1.php');
                        } elseif ($step == '2') {
                            require_once (get_template_directory() . '/include/form-donate-membership2.php');
                        } elseif ($step == '3') {
                            require_once (get_template_directory() . '/include/form-donate-membership3.php');
                        } elseif ($step == '4') {
                            require_once (get_template_directory() . '/include/send-form-donate-membership.php');
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

<?php
get_footer();
