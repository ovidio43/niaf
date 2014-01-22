<?php 

remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'custom_gallery');

function custom_gallery($attr) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	# hard-coding these values so that they can't be broken
	
	$attr['columns'] = 1;
	$attr['size'] = 'large';
	$attr['link'] = 'none';

	$attr['orderby'] = 'post__in';
	$attr['include'] = $attr['ids'];		

	#Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	
	if ( $output != '' )
		return $output;

	# We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'div',
		'icontag'    => 'div',
		'captiontag' => 'p',
		'columns'    => 1,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	$gallery_style = $gallery_div = '';

	if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "<!-- see gallery_shortcode() in functions.php -->";
	
	$gallery_div = "<div id='homepage-gallery-wrap' class='gallery ad-gallery gallery-columns-1 gallery-size-full'>";
	$gallery_div = $gallery_div."<div class='ad-image-wrapper'></div>";
	$gallery_div = $gallery_div."<div class='ad-nav'>";
	$gallery_div = $gallery_div."<div class='ad-thumbs'>";
	$gallery_div = $gallery_div."<ul class='ad-thumb-list'>";

	
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );
	
	foreach ( $attachments as $id => $attachment ) {
		//$link = wp_get_attachment_link($id, 'image-gallery', false, false);
		$fullimage = wp_get_attachment_image_src( $id, 'large' );
		$thumbimage = wp_get_attachment_image_src( $id, 'image-gallery' );

	
		

		
		$output .= "<li><a href='".$fullimage[0]."'><img src='".$thumbimage[0]."'/></a>";
			
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
				<p class='wp-caption-text homepage-gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</p>";
		}
		$output .= "</li>";
		
	}

		$output .= "</ul>";
		$output .= "</div>";
		$output .= "</div>";
		
		
	$output .= "</div>\n";

	return $output;
}

?>