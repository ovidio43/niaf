<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('list_articles_news'); ?>>
		<h3 class="entry-title">
			<?php 
			if (get_field('date_niaf_event_publish')!='') {
				$date = DateTime::createFromFormat('Ymd', get_field('date_niaf_event_publish'));
				echo $date->format('m/d/Y');
			}

			//the_field('date_niaf_event_publish');
			?>
			<br><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<div class="entry-content">

			<hr>
		</div>
	</article>
