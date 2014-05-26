<div class="featured-slider">
    <h2>FEATURED</h2>
    <ul class="bxslider-featured">
        <?php
        $type = 'niaf-featured';
        $args=array(
          'post_type' => $type,
          'post_status' => 'publish',
          'orderby' => 'rand',
          'posts_per_page'=>-1);                                 
        $myposts = new WP_Query( $args );
         if ( $myposts->have_posts() ) : 
            while ( $myposts->have_posts() ) : 
                $myposts->the_post(); 
                $featured = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'image-featured',false);  
                $target_link = get_post_meta(get_the_ID(), 'wpcf-target_link', true); 
                $link_ = get_post_meta(get_the_ID(), 'wpcf-link-external-page', true);
                if($link_==''){
                    $link_= get_permalink( get_the_ID() );
                } 
                if($target_link==1){
                    $target ="_blank";
                }else{
                    $target ="_self";
                }
                ?>
                <li>
                    <a href="<?php  echo $link_;?>" target="<?php echo $target;?>"><img src="<?php echo $featured['0'];?>" width="284" height="189" title="<?php echo get_the_title();?>" /></a>
                    <div class="featured-caption"><a href="<?php  echo $link_;?>"><b><?php the_title();?></b></a><br><a href="<?php  echo $link_;?>"><?php the_excerpt();?></a></div>
                </li>
        <?php endwhile; else: ?>
        <p><?php _e('Sorry, no featured matched your criteria.'); ?></p>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </ul>
</div>
<div class="partner-slider">
    <ul class="bxslider-partner">
        <?php
        $type = 'niaf-partner';
        $args=array(
          'post_type' => $type,
          'post_status' => 'publish',
          'orderby' => 'rand',
          'order' => 'DESC',
          'posts_per_page'=>-1);                                 
        $myposts = new WP_Query( $args );
         if ( $myposts->have_posts() ) : 
            while ( $myposts->have_posts() ) : 
                $myposts->the_post();    
                    $featured = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'large',false);
                    $link_ext = get_post_meta(get_the_ID(), 'wpcf-link-external-page', true);
                    if(!$link_ext!=''){
                            $link_ext= get_permalink( get_the_ID() );
                    } ?>
                    <li>
                        <a href="<?php echo $link_ext;?>" target="_blank"><img src="<?php echo $featured['0'];?>" width="300" height="70" title="<?php echo get_the_excerpt();?>"/></a>
                    </li>
        <?php endwhile; else: ?>
        <p><?php _e('Sorry, no slider matched your criteria.'); ?></p>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </ul>
</div>	
</div>	
		<footer class="footer-container">
            <div class="wrapper">
            	<div id="logo-footer">
            		<img src="<?php echo get_template_directory_uri();?>/img/logo-footer.png " width="254" height="165"/>
            	</div>
                <nav class="footer-nav">
					<!--<ul>
					  <li><a href="">Home</a></li>
					  <li><a href="">About</a></li>
					  <li><a href="">Memberships</a></li>
					</ul>-->
					<?php wp_nav_menu(array('theme_location' => 'Secondary','menu_id' => '','menu_class' => '','container' => '', 'container_id' => '', 'container_class' => '')); ?>
				</nav>
				<div class="creds">
                    <?php echo html_entity_decode(get_settings('footer_copy'));?>	
				</div>	
				
            </div>
        </footer>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>		
        <script src="<?php echo get_template_directory_uri();?>/js/jquery.bxslider/jquery.bxslider.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/fancyapp/jquery.fancybox.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.validate.min.js"></script>
		<script src="<?php echo get_template_directory_uri();?>/js/jquery.ad-gallery/jquery.ad-gallery.min.js"></script>
        <script src="<?php echo get_template_directory_uri();?>/js/main.min.js"></script>
        <script src="<?php echo get_template_directory_uri();?>/js/custom_forms.js"></script>
        
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-27971228-1', 'niaf.org');
          ga('send', 'pageview');

        </script>
        <?php wp_footer(); ?>
		
    </body>
</html>