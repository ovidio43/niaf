<?php
/**
 * Template name: form give the gif of heritage donate info
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
                                jQuery('#btn-reset').on('click', function() {
                                    limpiarformulario('#ss-form');
                                });
                            });
                            function limpiarformulario(formulario) {
                                /* Se encarga de leer todas las etiquetas input del formulario*/
                                jQuery(formulario).find('input').each(function() {
                                    switch (this.type) {
                                        case 'password':
                                        case 'text':
//            case 'hidden':
                                        case 'file':
                                            $(this).val('');
                                            break;
                                        case 'checkbox':
                                        case 'radio':
                                            this.checked = false;
                                    }
                                });

                                /* Se encarga de leer todas las etiquetas select del formulario */
                                $(formulario).find('select').each(function() {
                                    $("#" + this.id + " option[value=0]").attr("selected", true);
                                });
                                /* Se encarga de leer todas las etiquetas textarea del formulario */
                                $(formulario).find('textarea').each(function() {
                                    $(this).val('');
                                });
                            }
                        </script>
                        <?php
                        if ($step == '1' || $step == '') {
//                            require_once (get_template_directory() . '/include/form-give_the_gift_of_heritage_one_one.php');
                            require_once (get_template_directory() . '/include/form-donate-info1.php');
                        } elseif ($step == '2') {
//                            require_once (get_template_directory() . '/include/form-give_the_gift_of_heritage_one_two.php');
                            require_once (get_template_directory() . '/include/form-donate-info2.php');
                        } elseif ($step == '3') {
                            require_once (get_template_directory() . '/include/form-donate-info3test.php');
                        } elseif ($step == '4') {
                            require_once (get_template_directory() . '/include/send-form-donate-info.php');
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
