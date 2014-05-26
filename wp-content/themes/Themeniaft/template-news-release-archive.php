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
                        </h1>

                    </header> 

                    <?php if($_GET['filter']==""){ ?>
                      <div class="filternews">
                      <?php the_content();?>
                        <ul>
                          <?php 
                          $qYears = "SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'niaf_event' ORDER BY post_date DESC";
                          $years = $wpdb->get_col($qYears);
                          foreach($years as $year) : 
                            ?>
                            <li>:. <a href="?filter=<?php echo $year; ?>"><?php echo $year; ?> News Release Archive </a></li>
                          <?php endforeach; ?>  
                          </ul>           
                      </div>
                    <?php }?>                    
                    <?php
                    
                endwhile;
                wp_reset_postdata();
                ?>
                <?php
            endif;
            ?>          
            <?php
        if($_GET['filter']!=""){?>
        <br><br>
          <a href="/news-release-archive/" class="backlink">View News Release Archive</a><br><br>
            <?php $y = $_GET['filter'];

            $today = strtotime(date('Ymd'));
            $args = array(
                'post_type' => 'niaf_event',
                'post_status' => 'publish',
                'meta_key' => 'date_niaf_event_publish',
                'orderby' => 'meta_value',
                'order' => 'DESC',
                'offset' => 0,
                'posts_per_page' => -1,
                'date_query' => array(
                    array(
                        'year' => $y,
                        'compare' => '=',
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
          }
            ?>

        </div>
        <aside class="sidebar">
            <?php get_sidebar(); ?>
        </aside>
    </div> <!-- #main -->
</div> <!-- #main-container -->

<?php
get_footer();
