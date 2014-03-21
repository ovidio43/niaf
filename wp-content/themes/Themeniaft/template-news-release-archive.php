<?php
/**
 * Template name: Archive news and releases
 *
 * @package WordPress
 * @subpackage themeniaft
 * @since theme niaft 1.0
 */
get_header();
?>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('select#filter').on('change', function() {
            jQuery('form#formFilter').submit();
        });
    });
</script>
<div class="main-container">
    <div class="main clearfix">
        <div class="primary ">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    ?> 
                    <header class="entry-header">
                        <h1 class="entry-title">
                            <?php
                            the_title();
                            ?>
                            <form id="formFilter" action="" method="get" style="float: right;font-size: 15px;padding: 10px;">
                                <label for="filter">Filter : </label><select name="filter" id="filter" >
                                    <?php
                                    $year = Array('2013', '2012');
                                    foreach ($year as $value) {
                                        if ($_GET['filter'] == $value) {
                                            ?>
                                            <option value="<?php echo $value; ?>" selected><?php echo $value; ?></option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>                                    
                                </select>
                            </form>
                        </h1>

                    </header> 
                    <?php
                    the_content();
                endwhile;
                wp_reset_postdata();
                ?>
                <?php
            endif;
            ?>          
            <?php
            $y = $_GET['filter'];
            if (date('Y') == $y) {
                $y = (date('y') - 1);
            }
            $today = strtotime(date('Ymd'));
            $args = array(
                'post_type' => 'niaf_event',
                'post_status' => 'publish',
                'year' => $y,
                'meta_key' => 'date_niaf_event_publish',
                'orderby' => 'meta_value',
                'order' => 'ASC',
                'offset' => 0,
                'posts_per_page' => -1,
                'date_query' => array(
                    array(
                        'year' => date('Y'),
                        'compare' => '<',
                    )
                )
            );
            $myposts = new WP_Query($args);
            if ($myposts->have_posts()) :
                while ($myposts->have_posts()) : $myposts->the_post();
                    get_template_part('content', 'taxonomy');
                endwhile;
                wp_reset_query();
            endif;
            ?>  
        </div>
        <aside class="sidebar">
            <?php get_sidebar(); ?>
        </aside>
    </div> <!-- #main -->
</div> <!-- #main-container -->

<?php
get_footer();
