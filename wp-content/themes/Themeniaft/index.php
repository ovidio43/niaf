<?php 
/**
 * The index containing .
 *
 * @package WordPress
 * @subpackage themeniaft
 * @since theme niaft 1.0
 */
define('WP_USE_THEMES', false);
get_header(); ?>

        <div class="main-container">
            <div class="main clearfix">
				<div class="primary">
                    <div class="wrap-slider">
                        <ul class="bxslider-main">
						<?php
							$type = 'home-slider';
							$args=array(
							  'post_type' => $type,
							  'post_status' => 'publish',
							  'orderby' => 'date',
							  'order' => 'DESC',
							  'posts_per_page'=>-1);								 
							$myposts = new WP_Query( $args );
                             if ( $myposts->have_posts() ) : 
                                while ( $myposts->have_posts() ) : 
                                    $myposts->the_post();   
                                    $uri_external = get_post_meta(get_the_ID(), 'wpcf-link-external-page', true); 
                                    $target_link = get_post_meta(get_the_ID(), 'wpcf-target_link', true); 
                                    $featured = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'image-slide-banner',false);
                                    if($target_link==1){
                                        $target ="_blank";
                                    }else{
                                        $target ="_self";
                                    }
                                    ?>
                            <li>
                                <?php if($uri_external!=""){ ?>
                                <a href="<?php echo $uri_external;?>" target="<?php echo $target?>">
                                <?php }?>
                                <img src="<?php echo $featured['0']; ?>" width="650" height="390" title="<?php echo get_the_title().' '.get_the_excerpt();?>" />
                                <?php if($uri_external!=""){ ?>
                                </a>
                                <?php }?>
                                <div class="bx-caption"><span><?php echo get_the_title().'<br>'.get_the_excerpt();?></span></div>                                
                            </li>
                            <?php endwhile; else: ?>
                            <p><?php _e('Sorry, no slider matched your criteria.'); ?></p>
                            <?php endif; ?>
                            <?php wp_reset_query(); ?>
                        </ul>
                    </div>
                    <section id="home-top">
                        <h2>NIAF HIGHLIGHTS</h2>
                        <div class="wrap-home-top">						
						<?php
							$type = 'niaf-highlights';
							$args=array(
							  'post_type' => $type,
							  'post_status' => 'publish',
							  'orderby' => 'date',
							  'order' => 'DESC',
							  'posts_per_page'=>-1);								 
							$myposts = new WP_Query( $args );
                             if ( $myposts->have_posts() ) : 
                                while ( $myposts->have_posts() ) : 
                                    $myposts->the_post(); 
                                    $target_link ="";   
                                    $featured = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'image-highlights',false);
									$link_external = get_post_meta(get_the_ID(), 'wpcf-link-external-page', true);
                                    $target_link = get_post_meta(get_the_ID(), 'wpcf-target_link', true); 
                                    $feed_link = get_post_meta(get_the_ID(), 'wpcf-url-feed-or-xml', true);
                                    $target="";
									if($link_external==""){
											$link_external= get_permalink( get_the_ID() );
									}
                                    if($target_link==1){
                                        $target ="_blank";
                                    }else{
                                        $target ="_self";
                                    }                                    
                                    $imageFeatured=$featured['0'];
                                    $resumText = get_the_excerpt();
                                    $titleText =get_the_title();
                                    ?>
                                <?php if($feed_link!=""){
                                    $aux = xmlFeedNiaft($feed_link,1);
                                    for($i=0;$i< sizeof($aux);$i++){
                                        $imageFeatured = $aux[$i]["imagen"];
                                        $resumText = $aux[$i]["titulo"];
                                        //$titleText =$aux[$i]["titulo"];
                                        $link_external = $aux[$i]["link"] ;
                                    }
                                }?>										
    							<article class="box">
                                    <div class="wrap-img">
    									<a href="<?php echo $link_external;?>" target="<?php echo $target;?>"><img src="<?php echo $imageFeatured;?>" width="290" height="147" title="<?php echo $resumText;?>"></a>
    									<a href="<?php echo $link_external;?>" target="<?php echo $target;?>"><span><?php echo $titleText;?></span></a></div>
    									<a href="<?php echo $link_external;?>" target="<?php echo $target;?>"><?php echo $resumText;?></a>
                                </article>
                            <?php endwhile; else: ?>
                            <p><?php _e('Sorry, no slider matched your criteria.'); ?></p>
                            <?php endif; ?>
                            <?php wp_reset_query(); ?>							
                        </div>
                    </section>
                    <section id="home-bottom">
                        <h2>NIAF News & Upcoming Events</h2>
                        <?php
                        $type = 'news-events';
                        $args=array(
                            'post_type' => $type,
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'posts_per_page'=>-1,
                            'meta_query' => array(
                                'relation' => 'AND',
                                array(
                                    'key' => 'wpcf-start-date-evento',
                                    'value' => strtotime(date('m/d/Y')),
                                    'type' => 'NUMERIC',
                                    'compare' => '<='
                                ),
                                array(
                                    'key' => 'wpcf-end-date-evento',
                                    'value' => strtotime(date('m/d/Y')),
                                    'type' => 'NUMERIC',
                                    'compare' => '>='
                                )                                
                            )
                          );
                        $myposts = new WP_Query( $args );
                         if ( $myposts->have_posts() ) : 
                            while ( $myposts->have_posts() ) : 
                                $myposts->the_post();							
								$startdate = get_post_meta(get_the_ID(), 'wpcf-start-date-evento', true);
								$enddate = get_post_meta(get_the_ID(), 'wpcf-end-date-evento', true);
									$datepost = strtotime(get_the_date() );
									$link_page = get_post_meta(get_the_ID(),'wpcf-link-external-page',true);
									if(!$link_page!=''){
										$link_page= get_permalink( get_the_ID() );
									}
								?>								
									<?php  //if(  ($datepost >= $startdate) &&  ($datepost  <= $enddate) ){ ?>									
									
									<article class="resum-news <?php echo $datepost.' - '.$startdate.' - '.$enddate;?>">
											<div class="wrap-article"><a href="<?php echo $link_page;?>"><b><?php the_title();?></b></a> <a href="<?php echo $link_page;?>"><?php echo get_the_excerpt();?></a></div>
									</article>									
									
									<?php //}  ?>
						<?php   //} ?>						
                        <?php endwhile; else: ?>
                        <p><?php _e('Sorry, no events matched your criteria.'); ?></p>
                        <?php endif; ?>
                        <?php wp_reset_query(); ?>
                    </section>
                </div>
                <aside class="sidebar">
                    <?php get_sidebar(); ?>
                </aside>
    </div> <!-- #main -->
</div> <!-- #main-container -->

<?php get_footer(); ?>
   