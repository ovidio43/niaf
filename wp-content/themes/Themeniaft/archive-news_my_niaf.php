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

?>

<?php if($current_user->ID!=null){?>

<div class="main-container">

  <div class="main clearfix">

      <div class="primary">

          <?php

          if ( have_posts() ) : ?>

                  <header class="entry-header">

                    <h1 class="entry-title">

                      NIAF Announcements

                    </h1>

                  </header>                     

              <?php while ( have_posts() ) : the_post(); ?>                         

                <article id="post-<?php the_ID(); ?>" <?php post_class('list_articles_news'); ?>>

                  <h3 class="entry-title">

                    <?php 

                      echo get_the_date();

                    ?>

                    <br><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                  <div class="entry-content">

                    <hr>

                  </div>

                </article>

              <?php endwhile;?>

          <?php wp_reset_query(); 

        endif;

          ?>  

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

          <header class="entry-header">

            <h1 class="entry-title">

              NIAF Announcements

            </h1>

          </header>                                         

          <article id="post-<?php the_ID(); ?>" <?php post_class('list_articles_news'); ?>>

          <div class="entry-content">

            <?php

                  _e('<br><img src="http://www.niaf.org/wp-content/uploads/2014/03/my-NIAF-logo.png" align="right">

                  MyNIAF is an area of the website that is reserved exclusively for NIAF members.  If you are a current member, please proceed to log in on the right.test

                  <br>

                  <br>

                  If you are not a member, you are missing out!');

            ?>

          </div>

        </article>

        </div>

        <aside class="sidebar">

            <?php get_sidebar(); ?>

        </aside>

    </div> <!-- #main -->

  </div> <!-- #main-container -->

<?php }?>

<?php get_footer(); ?>

   